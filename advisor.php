<?php
session_start();
include('db.php');

$user_id = $_SESSION['user_id'] ?? 1;

$user_id = (int)$user_id;

$query = "SELECT * FROM profiles WHERE id = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    die("Database error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$user) {
    die("Profile not found for user ID: " . $user_id);
}

$full_name  = $user['full_name'] ?? 'Student';
$department = $user['department'] ?? 'Computer Science & Engineering';
$semester   = $user['semester'] ?? '';
$cgpa       = $user['cgpa'] ?? '';
$skills     = $user['skills'] ?? '';
$goal       = $user['goal'] ?? '';
$profile_pic = '';

if (!empty($user['profile_pic'])) {

    if (strpos($user['profile_pic'], 'http') === 0) {

        // If profile picture is an external URL
        $profile_pic = $user['profile_pic'];

    } else {

        // If profile picture is stored locally
        $profile_pic = 'uploads/' . $user['profile_pic'];

    }

}


/*
|--------------------------------------------------------------------------
| 2. FUNCTION: EXTRACT CURRENT SEMESTER FROM MASTER SYLLABUS
|--------------------------------------------------------------------------
|
| Example:
| 5th semester = 3rd Year Odd Semester
|
| 1st = 1st Year Odd
| 2nd = 1st Year Even
| 3rd = 2nd Year Odd
| 4th = 2nd Year Even
| 5th = 3rd Year Odd
| 6th = 3rd Year Even
| 7th = 4th Year Odd
| 8th = 4th Year Even
|
|--------------------------------------------------------------------------
*/

function getSemesterSection($fullText, $studentSemester)
{
    $semester = strtolower(trim($studentSemester));

    $semesterMap = [
        '1st' => '1 st Year Odd Semester',
        '1'   => '1 st Year Odd Semester',

        '2nd' => '1 st Year Even Semester',
        '2'   => '1 st Year Even Semester',

        '3rd' => '2 nd Year Odd Semester',
        '3'   => '2 nd Year Odd Semester',

        '4th' => '2 nd Year Even Semester',
        '4'   => '2 nd Year Even Semester',

        '5th' => '3 rd Year Odd Semester',
        '5'   => '3 rd Year Odd Semester',

        '6th' => '3 rd Year Even Semester',
        '6'   => '3 rd Year Even Semester',

        '7th' => '4 th Year Odd Semester',
        '7'   => '4 th Year Odd Semester',

        '8th' => '4 th Year Even Semester',
        '8'   => '4 th Year Even Semester'
    ];

    if (!isset($semesterMap[$semester])) {
        return '';
    }

    $startHeading = $semesterMap[$semester];

    /*
     * Because the uploaded syllabus contains the same heading
     * in the Table of Contents and again in the actual curriculum,
     * we look for the heading occurring after:
     *
     * "YEAR AND SEMESTER WISE DISTRIBUTION OF COURSES"
     */

    $distributionMarker = 'YEAR AND SEMESTER WISE DISTRIBUTION OF COURSES';

    $distributionPos = stripos($fullText, $distributionMarker);

    if ($distributionPos === false) {
        $distributionPos = 0;
    }

    $searchArea = substr($fullText, $distributionPos);

    $startPos = stripos($searchArea, $startHeading);

    if ($startPos === false) {
        return '';
    }

    /*
     * Find next semester heading.
     */

    $allHeadings = [
        '1 st Year Odd Semester',
        '1 st Year Even Semester',
        '2 nd Year Odd Semester',
        '2 nd Year Even Semester',
        '3 rd Year Odd Semester',
        '3 rd Year Even Semester',
        '4 th Year Odd Semester',
        '4 th Year Even Semester'
    ];

    $absoluteStart = $distributionPos + $startPos;

    $nextPosition = strlen($fullText);

    foreach ($allHeadings as $heading) {

        if ($heading === $startHeading) {
            continue;
        }

        $pos = stripos(
            $fullText,
            $heading,
            $absoluteStart + strlen($startHeading)
        );

        if ($pos !== false && $pos < $nextPosition) {
            $nextPosition = $pos;
        }
    }

    /*
     * Limit the extracted section.
     */

    $sectionLength = $nextPosition - $absoluteStart;

    if ($sectionLength <= 0) {
        return '';
    }

    $section = substr($fullText, $absoluteStart, $sectionLength);

    /*
     * Avoid sending an unnecessarily huge amount of text.
     */

    $maxLength = 18000;

    if (strlen($section) > $maxLength) {
        $section = substr($section, 0, $maxLength);
    }

    return trim($section);
}


/*
|--------------------------------------------------------------------------
| 3. HANDLE AI AJAX REQUEST
|--------------------------------------------------------------------------
*/

if (isset($_POST['get_ai_response'])) {

    header('Content-Type: application/json; charset=utf-8');

    $user_message = trim($_POST['message'] ?? '');

    if ($user_message === '') {
        echo json_encode([
            'status' => 'error',
            'message' => 'Message cannot be empty.'
        ]);
        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | 4. GET MASTER SYLLABUS
    |--------------------------------------------------------------------------
    */

    $syllabusQuery = "
        SELECT text_content, course_code, semester
        FROM syllabus_texts
        WHERE department = ?
        ORDER BY id DESC
        LIMIT 1
    ";

    $stmt = mysqli_prepare($conn, $syllabusQuery);

    if (!$stmt) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Could not prepare syllabus query.'
        ]);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "s", $department);
    mysqli_stmt_execute($stmt);

    $syllabusResult = mysqli_stmt_get_result($stmt);
    $syllabusRow = mysqli_fetch_assoc($syllabusResult);

    mysqli_stmt_close($stmt);


    if (!$syllabusRow || empty($syllabusRow['text_content'])) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Master syllabus was not found for your department.'
        ]);

        exit;
    }


    $fullSyllabus = $syllabusRow['text_content'];


    /*
    |--------------------------------------------------------------------------
    | 5. EXTRACT CURRENT SEMESTER
    |--------------------------------------------------------------------------
    */

    $currentSemesterSyllabus = getSemesterSection(
        $fullSyllabus,
        $semester
    );


    /*
     * If extraction fails, use a limited portion of the full syllabus
     * instead of sending the entire huge curriculum.
     */

    if (empty($currentSemesterSyllabus)) {

        $currentSemesterSyllabus = substr($fullSyllabus, 0, 18000);

        $semesterNote =
            "The semester-specific section could not be automatically extracted. "
            . "Use the provided curriculum carefully and do not invent courses.";

    } else {

        $semesterNote =
            "The following syllabus section belongs to the student's current semester.";
    }


    /*
    |--------------------------------------------------------------------------
    | 6. CREATE AI PROMPT
    |--------------------------------------------------------------------------
    */

    $prompt = <<<PROMPT

    You are CampusMind AI, a practical university Academic Advisor.

    Your job is to answer the student's question directly using the student's profile and official university syllabus.

    ========================
    STUDENT
    ========================

    Name: {$full_name}
    Department: {$department}
    Current Semester: {$semester}
    CGPA: {$cgpa}
    Skills: {$skills}
    Career Goal: {$goal}

    ========================
    CURRENT SEMESTER SYLLABUS
    ========================

    {$currentSemesterSyllabus}

    ========================
    STRICT RESPONSE RULES
    ========================

    1. DO NOT start with "Hello", "Welcome", "As your Academic Advisor", or any greeting.

    2. Answer the student's actual question immediately.

    3. If the student asks "What should I study?", provide the actual courses/topics they should study.

    4. If the student asks for a roadmap, provide a step-by-step roadmap.

    5. If the student asks for a study plan, provide a practical study plan.

    6. Use the student's CURRENT semester as the main focus.

    7. Prioritize the most important courses/topics from the provided current-semester syllabus.

    8. Do not simply repeat the student's semester information.

    9. Do not give generic motivational statements.

    10. Do not invent courses or topics that are not supported by the provided syllabus.

    11. Use the student's CGPA, skills and career goal when they are relevant.

    12. Give concrete actions the student can take.

    13. Use clear headings and bullet points when appropriate.

    14. Keep the answer focused but useful.

    15. If the question is broad, make a reasonable academic recommendation instead of asking unnecessary follow-up questions.

    ========================
    QUESTION
    ========================

    {$user_message}

    ========================

    Now answer ONLY the student's question.

    PROMPT;


    /*
    |--------------------------------------------------------------------------
    | 7. GEMINI API
    |--------------------------------------------------------------------------
    |
    | IMPORTANT:
    | Replace YOUR_GEMINI_API_KEY with your NEW API key.
    |
    |--------------------------------------------------------------------------
    */

    $apiKey = "AQ.Ab8RN6K9vMEmB3l34FhocO_wV43VAos6RgFV7CHUwNYmmvy0Vg";

    $endpoint =
        "https://generativelanguage.googleapis.com/"
        . "v1beta/models/gemini-3.6-flash:generateContent";


    /*
    |--------------------------------------------------------------------------
    | 8. REQUEST DATA
    |--------------------------------------------------------------------------
    */

    $data = [
        "contents" => [
            [
                "role" => "user",
                "parts" => [
                    [
                        "text" => $prompt
                    ]
                ]
            ]
        ],
        "generationConfig" => [
            "temperature" => 0.4,
            "maxOutputTokens" => 2000
        ]
    ];


    // Clean invalid UTF-8 characters from syllabus/prompt
    $prompt = mb_convert_encoding(
        $prompt,
        'UTF-8',
        'UTF-8'
    );

    $data = [
        "contents" => [
            [
                "role" => "user",
                "parts" => [
                    [
                        "text" => $prompt
                    ]
                ]
            ]
        ],
        "generationConfig" => [
            "temperature" => 0.4,
            "maxOutputTokens" => 2000
        ]
    ];

    $jsonData = json_encode(
        $data,
        JSON_UNESCAPED_UNICODE |
        JSON_UNESCAPED_SLASHES |
        JSON_INVALID_UTF8_SUBSTITUTE
    );

    if ($jsonData === false) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Could not encode request data.',
            'json_error' => json_last_error_msg()
        ]);

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | 9. CURL REQUEST
    |--------------------------------------------------------------------------
    */

    $ch = curl_init($endpoint);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,

        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'x-goog-api-key: ' . $apiKey
        ],

        CURLOPT_POSTFIELDS => $jsonData,

        CURLOPT_CONNECTTIMEOUT => 15,
        CURLOPT_TIMEOUT => 60,

        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
    ]);


    $response = curl_exec($ch);

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $curl_error = curl_error($ch);

    curl_close($ch);


    /*
    |--------------------------------------------------------------------------
    | 10. CURL ERROR
    |--------------------------------------------------------------------------
    */

    if ($response === false || !empty($curl_error)) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Curl Error: ' . ($curl_error ?: 'Unknown connection error')
        ]);

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | 11. DECODE GEMINI RESPONSE
    |--------------------------------------------------------------------------
    */

    $result_arr = json_decode($response, true);


    if (!is_array($result_arr)) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid response received from Gemini API.',
            'debug' => $response
        ]);

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | 12. API ERROR
    |--------------------------------------------------------------------------
    */

    if ($http_code < 200 || $http_code >= 300) {

        $errorMsg =
            $result_arr['error']['message']
            ?? ('Gemini API returned HTTP ' . $http_code);

        echo json_encode([
            'status' => 'error',
            'message' => $errorMsg,
            'http_code' => $http_code
        ]);

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | 13. GET AI TEXT
    |--------------------------------------------------------------------------
    */

    // if (
    //     isset($result_arr['candidates'][0]['content']['parts'][0]['text'])
    // ) {

    //     $ai_reply =
    //         $result_arr['candidates'][0]['content']['parts'][0]['text'];

    //     echo json_encode([
    //         'status' => 'success',
    //         'reply' => $ai_reply
    //     ], JSON_UNESCAPED_UNICODE);

    //     exit;
    // }
    if (
    isset($result_arr['candidates'][0]['content']['parts'][0]['text'])
    ) {

    $candidate = $result_arr['candidates'][0];

    $ai_reply =
        $candidate['content']['parts'][0]['text'];

    $finishReason =
        $candidate['finishReason']
        ?? 'UNKNOWN';

    echo json_encode([
        'status' => 'success',
        'reply' => $ai_reply,
        'finish_reason' => $finishReason
    ], JSON_UNESCAPED_UNICODE);

    exit;
    }


    /*
    |--------------------------------------------------------------------------
    | 14. EMPTY / INVALID RESPONSE
    |--------------------------------------------------------------------------
    */

    echo json_encode([
        'status' => 'error',
        'message' => 'Gemini returned an unexpected response.',
        'debug' => $result_arr
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">

<meta
    content="width=device-width, initial-scale=1.0"
    name="viewport"
>

<title>CampusMind AI - Academic Advisor</title>

<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
    rel="stylesheet"
>

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<script>

tailwind.config = {

    darkMode: "class",

    theme: {

        extend: {

            colors: {

                primary: "#111827",
                background: "#f8fafc",
                surface: "#ffffff",
                surface2: "#f1f5f9",
                border: "#e2e8f0",
                muted: "#64748b",
                accent: "#111827"

            },

            fontFamily: {

                inter: ["Inter", "sans-serif"]

            }

        }

    }

};

</script>

<style>

* {
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: #f8fafc;
}

/* Chat scrollbar */

.chat-scroll::-webkit-scrollbar {
    width: 5px;
}

.chat-scroll::-webkit-scrollbar-track {
    background: transparent;
}

.chat-scroll::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.chat-scroll::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Hide scrollbar */

.no-scrollbar::-webkit-scrollbar {
    display: none;
}

.no-scrollbar {
    scrollbar-width: none;
}

/* Smooth */

* {
    scroll-behavior: smooth;
}

/* Sidebar */

.sidebar-item {
    transition: all .2s ease;
}

.sidebar-item:hover {
    background: #f1f5f9;
}

.sidebar-item.active {
    background: #111827;
    color: white;
}

/* Mobile */

@media (max-width: 767px) {

    .desktop-sidebar {
        display: none;
    }

    .mobile-nav {
        display: flex;
    }

    .main-area {
        margin-left: 0 !important;
    }

    .topbar {
        left: 0 !important;
    }

}

@media (min-width: 768px) {

    .mobile-nav {
        display: none;
    }

}

</style>

</head>


<body class="h-screen overflow-hidden text-slate-900">


<!-- ========================================================= -->
<!-- DESKTOP SIDEBAR -->
<!-- ========================================================= -->

<aside
    class="desktop-sidebar fixed left-0 top-0 bottom-0 w-[220px] bg-white border-r border-slate-200 z-50 flex flex-col px-4 py-6"
>

    <!-- LOGO -->

    <div class="flex items-center gap-3 px-3 mb-10">

        <div
            class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center shrink-0"
        >

            <span class="material-symbols-outlined text-[22px]">
                psychology
            </span>

        </div>

        <div>

            <h1 class="text-[16px] font-bold text-slate-900">
                CampusMind
            </h1>

            <p class="text-[10px] text-slate-400">
                AI Advisor
            </p>

        </div>

    </div>


    <!-- NAVIGATION -->

    <nav class="flex flex-col gap-2 w-full">

        <!-- ADVISOR -->

        <a
            href="advisor.php"
            class="sidebar-item active flex items-center gap-3 w-full h-[52px] px-4 rounded-xl"
        >

            <span class="material-symbols-outlined text-[22px] shrink-0">
                psychology
            </span>

            <span class="text-[13px] font-semibold">
                Advisor
            </span>

        </a>


        <!-- EXAM PREP -->

        <a
            href="exam-prep.php"
            class="sidebar-item flex items-center gap-3 w-full h-[52px] px-4 rounded-xl text-slate-500"
        >

            <span class="material-symbols-outlined text-[22px] shrink-0">
                quiz
            </span>

            <span class="text-[13px] font-semibold">
                Exam Prep
            </span>

        </a>


        <!-- STUDY MATERIAL -->

        <a
            href="study-hub.php"
            class="sidebar-item flex items-center gap-3 w-full h-[52px] px-4 rounded-xl text-slate-500"
        >

            <span class="material-symbols-outlined text-[22px] shrink-0">
                auto_stories
            </span>

            <span class="text-[13px] font-semibold">
                Study Material
            </span>

        </a>

    </nav>



    <!-- PROFILE AT BOTTOM -->
     <!-- USER PROFILE -->

<div class="mt-auto pt-5 border-t border-slate-100">

    <a
        href="student_profile.php"
        class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 transition"
    >

        <!-- Profile Image -->

        <div
            class="w-10 h-10 rounded-full overflow-hidden border border-slate-200 bg-slate-100 shrink-0"
        >

            <?php if (!empty($profile_pic)): ?>

                <img
                    src="<?php echo htmlspecialchars($profile_pic); ?>"
                    class="w-full h-full object-cover"
                    onerror="this.style.display='none';"
                >

            <?php else: ?>

                <div class="w-full h-full flex items-center justify-center">

                    <span class="material-symbols-outlined text-slate-400">
                        person
                    </span>

                </div>

            <?php endif; ?>

        </div>


        <!-- User Info -->

        <div class="min-w-0">

            <p class="text-[12px] font-semibold text-slate-800 truncate">
                <?php echo htmlspecialchars($full_name); ?>
            </p>

            <p class="text-[10px] text-slate-400 mt-0.5">
                <?php echo htmlspecialchars($semester); ?> Semester
            </p>

        </div>

    </a>

</div>

    

</aside>


<!-- ========================================================= -->
<!-- TOP BAR -->
<!-- ========================================================= -->



<!-- ========================================================= -->
<!-- MAIN AREA -->
<!-- ========================================================= -->

<main
    id="main-content"
    class="main-area ml-[82px]  pb-[92px] h-screen flex flex-col"
>


    <!-- ===================================================== -->
    <!-- CHAT -->
    <!-- ===================================================== -->

    <div
        id="chat-container"
        class="chat-scroll flex-1 overflow-y-auto px-4 sm:px-7 lg:px-12 py-5 flex flex-col gap-5"
    >


        <!-- Date -->

        <div class="flex justify-center">

            <span
                id="dynamic-time"
                class="text-[10px] font-medium text-slate-400 bg-slate-100 px-3 py-1 rounded-full"
            >
                Today, --:-- --
            </span>

        </div>



        <!-- ================================================= -->
        <!-- AI INITIAL MESSAGE -->
        <!-- ================================================= -->

        <div
            class="flex gap-3 items-start w-full max-w-3xl mx-auto"
        >

            <!-- AI Icon -->

            <div
                class="w-8 h-8 rounded-lg bg-slate-900 text-white flex items-center justify-center shrink-0"
            >

                <span class="material-symbols-outlined text-[17px]">
                    psychology
                </span>

            </div>


            <!-- Message -->

            <div
                class="bg-white border border-slate-200 rounded-2xl rounded-tl-sm px-4 py-3 shadow-sm max-w-[85%]"
            >

                <p class="text-[13px] sm:text-[14px] leading-6 text-slate-700">

                    Welcome back,
                    <strong>
                        <?php echo htmlspecialchars(explode(" ", $full_name)[0]); ?>
                    </strong>
                    👋

                    <br>

                    I'm your CampusMind AI Academic Advisor.

                    Ask me anything about your coursework,
                    syllabus, study planning, or exam preparation.

                </p>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- INPUT AREA -->
    <!-- ===================================================== -->

    <div
        class="fixed bottom-0 right-0 left-[82px] bg-gradient-to-t from-background via-background to-transparent px-4 sm:px-7 lg:px-12 pb-4 pt-8 z-30"
    >

        <div class="max-w-3xl mx-auto">


            <!-- QUICK PROMPTS -->

            <div
                id="suggestions-box"
                class="flex gap-2 overflow-x-auto no-scrollbar mb-2.5"
            >

                <button
                    onclick="sendQuickPrompt('What should I study this semester?')"
                    class="shrink-0 bg-white border border-slate-200 hover:border-slate-400 text-slate-600 text-[11px] sm:text-[12px] font-medium px-3 py-1.5 rounded-lg transition shadow-sm"
                >

                    📚 What should I study?

                </button>


                <button
                    onclick="sendQuickPrompt('What are the most important topics in my current semester?')"
                    class="shrink-0 bg-white border border-slate-200 hover:border-slate-400 text-slate-600 text-[11px] sm:text-[12px] font-medium px-3 py-1.5 rounded-lg transition shadow-sm"
                >

                    ⭐ Important topics

                </button>


                <button
                    onclick="sendQuickPrompt('Make me a study plan based on my current semester syllabus.')"
                    class="shrink-0 bg-white border border-slate-200 hover:border-slate-400 text-slate-600 text-[11px] sm:text-[12px] font-medium px-3 py-1.5 rounded-lg transition shadow-sm"
                >

                    🗓 Study plan

                </button>

            </div>



            <!-- INPUT -->

            <div
                class="flex items-center bg-white border border-slate-300 rounded-xl shadow-md p-1.5 focus-within:border-slate-500 focus-within:ring-2 focus-within:ring-slate-100 transition"
            >

                <input
                    id="user-input"
                    type="text"
                    autocomplete="off"
                    placeholder="Ask your academic advisor..."
                    class="flex-1 bg-transparent border-none outline-none focus:ring-0 text-[13px] sm:text-[14px] text-slate-800 px-3 h-9 placeholder:text-slate-400"
                >


                <button
                    id="send-btn"
                    class="w-9 h-9 rounded-lg bg-slate-900 text-white flex items-center justify-center hover:bg-slate-700 transition shrink-0"
                >

                    <span class="material-symbols-outlined text-[19px]">
                        arrow_upward
                    </span>

                </button>

            </div>


            <p class="text-center text-[9px] text-slate-400 mt-1.5">
                CampusMind AI can make mistakes. Verify important academic information.
            </p>

        </div>

    </div>

</main>



<!-- ========================================================= -->
<!-- MOBILE NAV -->
<!-- ========================================================= -->

<nav
    class="mobile-nav fixed bottom-0 left-0 right-0 h-[64px] bg-white border-t border-slate-200 z-50 items-center justify-around px-3"
>

    <a
        href="advisor.php"
        class="flex flex-col items-center justify-center gap-0.5 text-slate-900 w-16"
    >

        <span class="material-symbols-outlined text-[21px]">
            psychology
        </span>

        <span class="text-[9px] font-semibold">
            Advisor
        </span>

    </a>


    <a
        href="exam-prep.php"
        class="flex flex-col items-center justify-center gap-0.5 text-slate-400 w-16"
    >

        <span class="material-symbols-outlined text-[21px]">
            quiz
        </span>

        <span class="text-[9px] font-semibold">
            Exam
        </span>

    </a>


    <a
        href="study-hub.php"
        class="flex flex-col items-center justify-center gap-0.5 text-slate-400 w-16"
    >

        <span class="material-symbols-outlined text-[21px]">
            auto_stories
        </span>

        <span class="text-[9px] font-semibold">
            Study
        </span>

    </a>


    <a
        href="profile.php"
        class="flex flex-col items-center justify-center gap-0.5 text-slate-400 w-16"
    >

        <span class="material-symbols-outlined text-[21px]">
            person
        </span>

        <span class="text-[9px] font-semibold">
            Profile
        </span>

    </a>

</nav>



<!-- ========================================================= -->
<!-- YOUR EXISTING JAVASCRIPT -->
<!-- ========================================================= -->

<script>

/* TIME */

function updateChatTime() {

    const now = new Date();

    let hours = now.getHours();

    const minutes =
        now.getMinutes()
        .toString()
        .padStart(2, '0');

    const ampm =
        hours >= 12
            ? 'PM'
            : 'AM';

    hours = hours % 12;

    hours = hours
        ? hours
        : 12;

    const timeString =
        `${hours}:${minutes} ${ampm}`;

    const timeElement =
        document.getElementById('dynamic-time');

    if (timeElement) {

        timeElement.innerText =
            `Today, ${timeString}`;

    }

}

updateChatTime();



/* ELEMENTS */

const chatContainer =
    document.getElementById('chat-container');

const userInput =
    document.getElementById('user-input');

const sendBtn =
    document.getElementById('send-btn');

const suggestionsBox =
    document.getElementById('suggestions-box');

const profilePicUrl =
    <?php echo json_encode($profile_pic); ?>;

let hasInteracted = false;



/* HIDE SUGGESTIONS */

function hideSuggestions() {

    if (!hasInteracted) {

        hasInteracted = true;

        suggestionsBox.style.opacity = '0';

        suggestionsBox.style.transform =
            'translateY(8px)';

        setTimeout(() => {

            suggestionsBox.style.display =
                'none';

        }, 250);

    }

}



/* ESCAPE HTML */

function escapeHtml(text) {

    const div =
        document.createElement('div');

    div.textContent =
        text;

    return div.innerHTML;

}



/* MARKDOWN */

function formatAIText(text) {

    let formatted =
        escapeHtml(text);

    formatted =
        formatted.replace(
            /###\s*(.*?)(?=\n|$)/g,
            '<strong class="block font-bold text-slate-900 mt-2">$1</strong>'
        );

    formatted =
        formatted.replace(
            /\*\*(.*?)\*\*/g,
            '<strong>$1</strong>'
        );

    formatted =
        formatted.replace(
            /\n/g,
            '<br>'
        );

    return formatted;

}



/* APPEND MESSAGE */

function appendMessage(text, sender) {

    hideSuggestions();

    const messageDiv =
        document.createElement('div');


    if (sender === 'user') {

        messageDiv.className =
            "flex gap-3 items-start w-full max-w-3xl mx-auto justify-end";


        const safeText =
            escapeHtml(text);


        messageDiv.innerHTML = `

            <div class="bg-slate-900 text-white px-4 py-3 rounded-2xl rounded-tr-sm shadow-sm max-w-[80%]">

                <p class="text-[13px] sm:text-[14px] leading-6">

                    ${safeText}

                </p>

            </div>

        `;

    }

    else {

        messageDiv.className =
            "flex gap-3 items-start w-full max-w-3xl mx-auto";


        messageDiv.innerHTML = `

            <div class="w-8 h-8 rounded-lg bg-slate-900 text-white flex items-center justify-center shrink-0">

                <span class="material-symbols-outlined text-[17px]">
                    psychology
                </span>

            </div>


            <div class="bg-white border border-slate-200 px-4 py-3 rounded-2xl rounded-tl-sm shadow-sm max-w-[85%]">

                <p class="text-[13px] sm:text-[14px] leading-6 text-slate-700">

                    ${formatAIText(text)}

                </p>

            </div>

        `;

    }


    chatContainer.appendChild(messageDiv);

    chatContainer.scrollTop =
        chatContainer.scrollHeight;

}



/* SEND MESSAGE */

async function handleSendMessage() {

    const text =
        userInput.value.trim();


    if (!text) {

        return;

    }


    appendMessage(
        text,
        'user'
    );


    userInput.value = '';


    /* LOADING */

    const loadingId =
        'loading-' + Date.now();


    const loadingDiv =
        document.createElement('div');


    loadingDiv.id =
        loadingId;


    loadingDiv.className =
        "flex gap-3 items-start w-full max-w-3xl mx-auto";


    loadingDiv.innerHTML = `

        <div class="w-8 h-8 rounded-lg bg-slate-900 text-white flex items-center justify-center shrink-0">

            <span class="material-symbols-outlined text-[17px]">
                psychology
            </span>

        </div>


        <div class="bg-white border border-slate-200 px-4 py-3 rounded-2xl rounded-tl-sm shadow-sm">

            <p class="text-[13px] text-slate-500">

                Thinking...

            </p>

        </div>

    `;


    chatContainer.appendChild(
        loadingDiv
    );


    chatContainer.scrollTop =
        chatContainer.scrollHeight;


    try {

        const formData =
            new URLSearchParams();


        formData.append(
            'get_ai_response',
            '1'
        );


        formData.append(
            'message',
            text
        );


        const response =
            await fetch(
                'advisor.php',
                {

                    method: 'POST',

                    headers: {

                        'Content-Type':
                            'application/x-www-form-urlencoded'

                    },

                    body:
                        formData

                }
            );


        if (!response.ok) {

            throw new Error(
                `Server returned HTTP ${response.status}`
            );

        }


        const data =
            await response.json();


        const loadingElement =
            document.getElementById(
                loadingId
            );


        if (loadingElement) {

            loadingElement.remove();

        }


        if (data.status === 'success') {

            appendMessage(
                data.reply,
                'ai'
            );

        }

        else {

            console.error(
                "API Error:",
                data
            );


            appendMessage(
                "API Error: " +
                (data.message ||
                'Unknown API error.'),
                'ai'
            );

        }


    }

    catch (error) {

        console.error(
            'Advisor request error:',
            error
        );


        const loadingElement =
            document.getElementById(
                loadingId
            );


        if (loadingElement) {

            loadingElement.remove();

        }


        appendMessage(
            "Network/server error: " +
            error.message,
            'ai'
        );

    }

}



/* QUICK PROMPT */

function sendQuickPrompt(text) {

    userInput.value =
        text;

    handleSendMessage();

}



/* EVENTS */

sendBtn.addEventListener(
    'click',
    handleSendMessage
);


userInput.addEventListener(
    'keypress',
    (e) => {

        if (e.key === 'Enter') {

            e.preventDefault();

            handleSendMessage();

        }

    }
);

</script>

</body>

</html>