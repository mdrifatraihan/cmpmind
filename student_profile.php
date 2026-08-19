<?php
session_start();
include('db.php');

/*
|--------------------------------------------------------------------------
| GET LOGGED-IN USER
|--------------------------------------------------------------------------
*/

$user_id = (int)($_SESSION['user_id'] ?? 0);

if ($user_id <= 0) {
    die("User session not found.");
}


/*
|--------------------------------------------------------------------------
| GET STUDENT PROFILE
|--------------------------------------------------------------------------
*/

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


/*
|--------------------------------------------------------------------------
| PROFILE NOT FOUND
|--------------------------------------------------------------------------
*/

if (!$user) {

    $user = [
        'full_name'   => 'Student',
        'department'  => 'Computer Science & Engineering',
        'semester'    => '',
        'cgpa'        => '',
        'skills'      => '',
        'goal'        => '',
        'profile_pic' => ''
    ];
}


/*
|--------------------------------------------------------------------------
| STUDENT DATA
|--------------------------------------------------------------------------
*/

$full_name  = $user['full_name'] ?? 'Student';
$department = $user['department'] ?? '';
$semester   = $user['semester'] ?? '';
$cgpa       = $user['cgpa'] ?? '';
$skills     = $user['skills'] ?? '';
$goal       = $user['goal'] ?? '';



/*
|--------------------------------------------------------------------------
| PROFILE IMAGE
|--------------------------------------------------------------------------
*/

$profile_pic = '';

if (!empty($user['profile_pic'])) {

    if (strpos($user['profile_pic'], 'http') === 0) {

        $profile_pic = $user['profile_pic'];

    } else {

        $profile_pic = 'uploads/' . $user['profile_pic'];

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Student Profile - CampusMind AI</title>

<script src="https://cdn.tailwindcss.com"></script>

<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet"
>

<link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
    rel="stylesheet"
>

<style>

body {
    font-family: 'Inter', sans-serif;
}

.profile-card {
    transition: all 0.2s ease;
}

.profile-card:hover {
    transform: translateY(-2px);
}

</style>

</head>


<body class="bg-slate-50 min-h-screen text-slate-900">


<!-- =========================================================
     TOP HEADER
========================================================= -->

<header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-5 md:px-8 sticky top-0 z-50">

    <div class="flex items-center gap-3">

        <a
            href="advisor.php"
            class="w-9 h-9 rounded-full flex items-center justify-center hover:bg-slate-100 transition"
        >

            <span class="material-symbols-outlined">
                arrow_back
            </span>

        </a>


        <div>

            <h1 class="font-bold text-lg">
                Student Profile
            </h1>

            <p class="text-xs text-slate-500">
                CampusMind AI
            </p>

        </div>

    </div>


    <!-- CREATE NEW PROFILE -->

    <a
        href="profile.php"
        class="flex items-center gap-2 bg-black text-white px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-slate-800 transition shadow-sm"
    >

        <span class="material-symbols-outlined text-[18px]">
            add
        </span>

        <span class="hidden sm:inline">
            Create New Profile
        </span>

    </a>

</header>



<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<main class="max-w-5xl mx-auto px-4 md:px-8 py-8">


<!-- =========================================================
     PROFILE HERO
========================================================= -->

<section class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">


    <!-- COVER -->

    <div class="h-32 md:h-40 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-700">
    </div>


    <!-- PROFILE INFO -->

    <div class="px-5 md:px-8 pb-7">


        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5">


            <!-- IMAGE + NAME -->

            <div class="flex items-end gap-4 -mt-12">

                <div class="w-24 h-24 md:w-28 md:h-28 rounded-2xl overflow-hidden bg-slate-200 border-4 border-white shadow-lg flex items-center justify-center shrink-0">

                    <?php if (!empty($profile_pic)): ?>

                        <img
                            src="<?php echo htmlspecialchars($profile_pic); ?>"
                            class="w-full h-full object-cover"
                            onerror="this.style.display='none';"
                        >

                    <?php else: ?>

                        <span class="material-symbols-outlined text-slate-400 text-5xl">
                            person
                        </span>

                    <?php endif; ?>

                </div>


                <div class="pb-1">

                    <h2 class="text-2xl md:text-3xl font-bold">
                        <?php echo htmlspecialchars($full_name); ?>
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        <?php echo htmlspecialchars($department); ?>
                    </p>

                </div>

            </div>


            <!-- SEMESTER BADGE -->

            <?php if (!empty($semester)): ?>

            <div class="inline-flex items-center gap-2 bg-slate-100 border border-slate-200 px-4 py-2 rounded-xl">

                <span class="material-symbols-outlined text-[20px]">
                    school
                </span>

                <div>

                    <p class="text-[11px] text-slate-500 uppercase font-semibold">
                        Current Semester
                    </p>

                    <p class="font-bold text-sm">
                        <?php echo htmlspecialchars($semester); ?>
                    </p>

                </div>

            </div>

            <?php endif; ?>


        </div>

    </div>

</section>



<!-- =========================================================
     INFORMATION GRID
========================================================= -->

<section class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">


    <!-- ACADEMIC INFORMATION -->

    <div class="profile-card bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">

                <span class="material-symbols-outlined">
                    school
                </span>

            </div>

            <div>

                <h3 class="font-bold">
                    Academic Information
                </h3>

                <p class="text-xs text-slate-500">
                    Current academic status
                </p>

            </div>

        </div>


        <div class="space-y-4">


            <div>

                <p class="text-xs text-slate-500 mb-1">
                    Department
                </p>

                <p class="font-semibold">
                    <?php echo htmlspecialchars($department ?: 'Not provided'); ?>
                </p>

            </div>


            <div>

                <p class="text-xs text-slate-500 mb-1">
                    Current Semester
                </p>

                <p class="font-semibold">
                    <?php echo htmlspecialchars($semester ?: 'Not provided'); ?>
                </p>

            </div>


            <div>

                <p class="text-xs text-slate-500 mb-1">
                    CGPA
                </p>

                <p class="font-semibold">

                    <?php
                    echo $cgpa !== ''
                        ? htmlspecialchars($cgpa)
                        : 'Not provided';
                    ?>

                </p>

            </div>

        </div>

    </div>



    <!-- SKILLS -->

    <div class="profile-card bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">

                <span class="material-symbols-outlined">
                    code
                </span>

            </div>

            <div>

                <h3 class="font-bold">
                    Skills
                </h3>

                <p class="text-xs text-slate-500">
                    Technical skills
                </p>

            </div>

        </div>


        <?php if (!empty(trim($skills))): ?>

            <div class="flex flex-wrap gap-2">

                <?php

                $skillList = preg_split(
                    '/[,]+/',
                    $skills
                );

                foreach ($skillList as $skill):

                    $skill = trim($skill);

                    if ($skill === '') {
                        continue;
                    }

                ?>

                    <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200 text-sm font-medium">

                        <?php echo htmlspecialchars($skill); ?>

                    </span>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <p class="text-sm text-slate-500">
                No skills added yet.
            </p>

        <?php endif; ?>

    </div>



    <!-- CAREER GOAL -->

    <div class="md:col-span-2 profile-card bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">

                <span class="material-symbols-outlined">
                    flag
                </span>

            </div>

            <div>

                <h3 class="font-bold">
                    Career Goal
                </h3>

                <p class="text-xs text-slate-500">
                    Student's future objective
                </p>

            </div>

        </div>


        <?php if (!empty(trim($goal))): ?>

            <p class="text-slate-700 leading-relaxed">
                <?php echo nl2br(htmlspecialchars($goal)); ?>
            </p>

        <?php else: ?>

            <p class="text-sm text-slate-500">
                No career goal added yet.
            </p>

        <?php endif; ?>

    </div>


</section>



<!-- =========================================================
     PROFILE ACTION
========================================================= -->

<!-- <div class="mt-6 flex justify-end">

    <a
        href="create-profile.php"
        class="flex items-center gap-2 border border-slate-300 bg-white px-5 py-3 rounded-xl text-sm font-semibold hover:bg-slate-100 transition"
    >

    </a>

</div> -->


</main>


</body>

</html>