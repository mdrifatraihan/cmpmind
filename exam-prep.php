<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">

<meta
    content="width=device-width, initial-scale=1.0"
    name="viewport"
>

<title>CampusMind AI - Exam Prep</title>

<!-- Material Icons -->
<link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
    rel="stylesheet"
>

<!-- Inter -->
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet"
>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<script>

tailwind.config = {

    darkMode: "class",

    theme: {

        extend: {

            colors: {

                "background": "#f7f9fb",
                "surface": "#ffffff",
                "surface-container-low": "#f2f4f6",
                "surface-container": "#eceef0",
                "surface-variant": "#e0e3e5",

                "primary": "#000000",
                "on-primary": "#ffffff",

                "on-background": "#191c1e",
                "on-surface": "#191c1e",
                "on-surface-variant": "#44474d",

                "outline": "#75777e",
                "outline-variant": "#c5c6cd"

            },

            borderRadius: {

                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"

            },

            spacing: {

                "base": "4px",
                "xs": "8px",
                "sm": "12px",
                "md": "16px",
                "lg": "24px",
                "xl": "32px",

                "container-margin": "16px"

            },

            fontFamily: {

                "body": ["Inter", "sans-serif"]

            }

        }

    }

};

</script>


<style>

body {
    font-family: 'Inter', sans-serif;
}


/* =========================================================
   SIDEBAR
   ========================================================= */

.sidebar-item {
    transition:
        background-color 0.2s ease,
        color 0.2s ease,
        transform 0.2s ease;
}

.sidebar-item:hover {
    background: #f8fafc;
    color: #000;
}

.sidebar-item.active {
    background: #f1f5f9;
    color: #000;
}

.sidebar-item.active:hover {
    background: #e9eef3;
}


/* =========================================================
   SCROLLBAR
   ========================================================= */

.custom-scrollbar::-webkit-scrollbar {
    width: 5px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #c5c6cd;
    border-radius: 10px;
}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 767px) {

    .desktop-sidebar {
        display: none;
    }

    .main-area {
        margin-left: 0 !important;
    }

}

</style>

</head>


<body class="bg-background text-on-background min-h-screen">


<!-- ========================================================= -->
<!-- DESKTOP SIDEBAR -->
<!-- ========================================================= -->

<aside
    class="desktop-sidebar fixed left-0 top-0 bottom-0 w-[220px] bg-white border-r border-slate-200 z-50 flex flex-col px-4 py-6"
>


    <!-- ===================================================== -->
    <!-- LOGO -->
    <!-- ===================================================== -->

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


    <!-- ===================================================== -->
    <!-- NAVIGATION -->
    <!-- ===================================================== -->

    <nav class="flex flex-col gap-2 w-full">


        <!-- ADVISOR -->

        <a
            href="advisor.php"
            class="sidebar-item flex items-center gap-3 w-full h-[52px] px-4 rounded-xl text-slate-500"
        >

            <span class="material-symbols-outlined text-[22px] shrink-0">
                psychology
            </span>

            <span class="text-[13px] font-semibold">
                Advisor
            </span>

        </a>


        <!-- ================================================= -->
        <!-- EXAM PREP - ACTIVE -->
        <!-- ================================================= -->

        <a
            href="exam-prep.php"
            class="sidebar-item active flex items-center gap-3 w-full h-[52px] px-4 rounded-xl"
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


    <!-- ===================================================== -->
    <!-- PROFILE AT BOTTOM -->
    <!-- ===================================================== -->

    <div class="mt-auto pt-5 border-t border-slate-100">


        <a
            href="student_profile.php"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 transition"
        >


            <!-- PROFILE IMAGE -->

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


            <!-- USER INFO -->

            <div class="min-w-0">

                <p class="text-[12px] font-semibold text-slate-800 truncate">

                    <?php echo htmlspecialchars($full_name ?? 'Student'); ?>

                </p>


                <p class="text-[10px] text-slate-400 mt-0.5">

                    <?php echo htmlspecialchars($semester ?? ''); ?>

                    Semester

                </p>

            </div>

        </a>

    </div>

</aside>



<!-- ========================================================= -->
<!-- MAIN CONTENT -->
<!-- ========================================================= -->

<main
    class="main-area ml-[220px] min-h-screen pt-8 px-6 md:px-10 pb-10"
>


    <!-- ===================================================== -->
    <!-- PAGE HEADER -->
    <!-- ===================================================== -->

    <div class="max-w-[1280px] mx-auto mb-8">

        <h1
            class="text-3xl md:text-4xl font-bold tracking-tight text-slate-900 mb-2"
        >
            Exam Prep Generator
        </h1>

        <p class="text-slate-500 text-[15px]">

            Structure academic content into
            Varendra-standard assessment questions.

        </p>

    </div>



    <!-- ===================================================== -->
    <!-- CONTENT GRID -->
    <!-- ===================================================== -->

    <div
        class="max-w-[1280px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6"
    >


        <!-- ================================================= -->
        <!-- LEFT PANEL -->
        <!-- ================================================= -->

        <section class="lg:col-span-5">

            <div
                class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm"
            >


                <h2
                    class="text-lg font-semibold text-slate-900 mb-6"
                >
                    Source Material
                </h2>


                <!-- COURSE -->

                <div class="mb-5">

                    <label
                        for="course-select"
                        class="block text-[11px] font-semibold uppercase tracking-wide text-slate-500 mb-2"
                    >
                        Select Course
                    </label>


                    <div class="relative">

                        <select
                            id="course-select"
                            class="w-full h-11 bg-slate-50 border border-slate-200 focus:border-slate-900 focus:ring-0 rounded-lg text-slate-800 px-3 appearance-none"
                        >

                            <option disabled selected value="">
                                Choose a subject...
                            </option>

                            <option>
                                CSE 111: C Programming
                            </option>

                            <option>
                                CSE 221: Algorithms
                            </option>

                            <option>
                                CSE 311: Database Systems
                            </option>

                            <option>
                                CSE 411: Artificial Intelligence
                            </option>

                        </select>


                        <span
                            class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400"
                        >
                            expand_more
                        </span>

                    </div>

                </div>



                <!-- LECTURE NOTES -->

                <div class="mb-6">

                    <div class="flex justify-between items-center mb-2">

                        <label
                            for="lecture-notes"
                            class="text-[11px] font-semibold uppercase tracking-wide text-slate-500"
                        >
                            Lecture Notes
                        </label>

                        <span class="text-[11px] text-slate-400">
                            Max 5000 chars
                        </span>

                    </div>


                    <textarea
                        id="lecture-notes"
                        rows="8"
                        maxlength="5000"
                        placeholder="Paste your lecture notes, syllabus topics, or textbook excerpts here..."
                        class="w-full bg-slate-50 border border-slate-200 focus:border-slate-900 focus:ring-0 rounded-lg text-slate-800 p-3 resize-y placeholder:text-slate-400"
                    ></textarea>

                </div>



                <!-- GENERATE BUTTON -->

                <button
                    id="generate-btn"
                    class="w-full h-12 bg-slate-900 text-white rounded-lg font-semibold hover:bg-slate-800 transition flex items-center justify-center gap-2"
                >

                    <span class="material-symbols-outlined text-[20px]">
                        auto_awesome
                    </span>

                    Generate Questions

                </button>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- RIGHT PANEL -->
        <!-- ================================================= -->

        <section class="lg:col-span-7">

            <div
                class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm"
            >


                <!-- HEADER -->

                <div
                    class="flex items-center justify-between mb-6 pb-4 border-b border-slate-200"
                >

                    <h2
                        class="text-lg font-semibold text-slate-900 flex items-center gap-2"
                    >

                        <span class="material-symbols-outlined">
                            library_books
                        </span>

                        Generated Question Bank

                    </h2>


                    <span
                        class="bg-slate-100 text-slate-500 px-3 py-1 rounded-full text-[11px] font-semibold"
                    >
                        CSE 221: Algorithms
                    </span>

                </div>



                <!-- QUESTIONS -->

                <div class="space-y-6">


                    <!-- SHORT -->

                    <div>

                        <div class="flex items-center gap-2 mb-3">

                            <div class="w-1 h-4 bg-slate-500 rounded-full"></div>

                            <h3 class="font-semibold text-slate-700">

                                Short Questions

                                <span class="text-slate-400 text-sm font-normal">
                                    (2 Marks Each)
                                </span>

                            </h3>

                        </div>


                        <div class="space-y-3">


                            <div
                                class="bg-slate-50 rounded-lg border border-slate-200 p-4"
                            >

                                <p class="text-[15px] text-slate-800 leading-relaxed">

                                    <span class="font-bold">
                                        Q1.
                                    </span>

                                    Define the term 'Algorithm' and list two
                                    essential characteristics it must possess.

                                </p>

                            </div>


                            <div
                                class="bg-slate-50 rounded-lg border border-slate-200 p-4"
                            >

                                <p class="text-[15px] text-slate-800 leading-relaxed">

                                    <span class="font-bold">
                                        Q2.
                                    </span>

                                    Differentiate between Time Complexity
                                    and Space Complexity.

                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- DESCRIPTIVE -->

                    <div>

                        <div class="flex items-center gap-2 mb-3">

                            <div class="w-1 h-4 bg-emerald-500 rounded-full"></div>

                            <h3 class="font-semibold text-slate-700">

                                Descriptive Questions

                                <span class="text-slate-400 text-sm font-normal">
                                    (5 Marks Each)
                                </span>

                            </h3>

                        </div>


                        <div
                            class="bg-slate-50 rounded-lg border border-slate-200 p-4"
                        >

                            <p class="text-[15px] text-slate-800 leading-relaxed">

                                <span class="font-bold">
                                    Q3.
                                </span>

                                Explain the Divide and Conquer approach
                                with the help of the Merge Sort algorithm.
                                Provide its recurrence relation.

                            </p>

                        </div>

                    </div>



                    <!-- ANALYTICAL -->

                    <div>

                        <div class="flex items-center gap-2 mb-3">

                            <div class="w-1 h-4 bg-slate-900 rounded-full"></div>

                            <h3 class="font-semibold text-slate-700">

                                Analytical Questions

                                <span class="text-slate-400 text-sm font-normal">
                                    (10 Marks Each)
                                </span>

                            </h3>

                        </div>


                        <div
                            class="bg-slate-50 rounded-lg border border-slate-200 p-4"
                        >

                            <p class="text-[15px] text-slate-800 leading-relaxed">

                                <span class="font-bold">
                                    Q4.
                                </span>

                                Consider a scenario where you need to find
                                the shortest path in a weighted, directed
                                graph representing city traffic routes.

                                <br><br>

                                (a) Which algorithm (Dijkstra's or
                                Bellman-Ford) would you choose if all edge
                                weights are positive?

                                <br><br>

                                (b) Trace your chosen algorithm on a sample
                                graph with 4 nodes (A, B, C, D).

                            </p>

                        </div>

                    </div>

                </div>



                <!-- ACTIONS -->

                <div
                    class="mt-6 pt-4 border-t border-slate-200 flex justify-end gap-3"
                >

                    <button
                        class="h-10 px-4 border border-slate-300 text-slate-600 rounded-lg text-sm font-medium hover:bg-slate-50 transition flex items-center gap-2"
                    >

                        <span class="material-symbols-outlined text-[18px]">
                            content_copy
                        </span>

                        Copy All

                    </button>


                    <button
                        class="h-10 px-4 bg-slate-900 text-white rounded-lg text-sm font-medium hover:bg-slate-800 transition flex items-center gap-2"
                    >

                        <span class="material-symbols-outlined text-[18px]">
                            download
                        </span>

                        Export PDF

                    </button>

                </div>

            </div>

        </section>

    </div>

</main>



<!-- ========================================================= -->
<!-- MOBILE BOTTOM NAV -->
<!-- ========================================================= -->

<nav
    class="md:hidden fixed bottom-0 left-0 w-full z-50 h-16 bg-white border-t border-slate-200 flex"
>


    <!-- STUDY -->

    <a
        href="study-hub.php"
        class="flex-1 flex flex-col items-center justify-center text-slate-500"
    >

        <span class="material-symbols-outlined text-[22px]">
            auto_stories
        </span>

        <span class="text-[10px] font-semibold">
            Study Hub
        </span>

    </a>


    <!-- EXAM ACTIVE -->

    <a
        href="exam-prep.php"
        class="flex-1 flex flex-col items-center justify-center text-black bg-slate-50 border-t-2 border-black"
    >

        <span
            class="material-symbols-outlined text-[22px]"
            style="font-variation-settings: 'FILL' 1;"
        >
            quiz
        </span>

        <span class="text-[10px] font-semibold">
            Exam Prep
        </span>

    </a>


    <!-- ADVISOR -->

    <a
        href="advisor.php"
        class="flex-1 flex flex-col items-center justify-center text-slate-500"
    >

        <span class="material-symbols-outlined text-[22px]">
            psychology
        </span>

        <span class="text-[10px] font-semibold">
            Advisor
        </span>

    </a>


    <!-- PROFILE -->

    <a
        href="student_profile.php"
        class="flex-1 flex flex-col items-center justify-center text-slate-500"
    >

        <span class="material-symbols-outlined text-[22px]">
            person
        </span>

        <span class="text-[10px] font-semibold">
            Profile
        </span>

    </a>

</nav>



<script>

/* =========================================================
   DEMO GENERATE BUTTON
   Backend পরে connect করবে
   ========================================================= */

const generateBtn =
    document.getElementById('generate-btn');

generateBtn.addEventListener('click', function () {

    const original =
        this.innerHTML;

    this.innerHTML = `
        <span class="material-symbols-outlined animate-spin text-[20px]">
            progress_activity
        </span>
        Generating Questions...
    `;

    this.disabled = true;

    setTimeout(() => {

        this.innerHTML = original;

        this.disabled = false;

    }, 1500);

});

</script>


</body>
</html>