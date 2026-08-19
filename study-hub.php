<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CampusMind AI - Study Hub</title>

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
    rel="stylesheet"
>

<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
    rel="stylesheet"
>

<script>
tailwind.config = {

    darkMode: "class",

    theme: {

        extend: {

            colors: {

                primary: "#000000",
                background: "#f7f9fb",

                surface: "#f7f9fb",
                surface-container-lowest: "#ffffff",
                surface-container-low: "#f2f4f6",
                surface-container: "#eceef0",
                surface-container-high: "#e6e8ea",
                surface-container-highest: "#e0e3e5",

                secondary: "#505f76",
                secondary-container: "#d0e1fb",

                on-background: "#191c1e",
                on-surface: "#191c1e",
                on-surface-variant: "#44474d",

                outline: "#75777e",
                outline-variant: "#c5c6cd",

                on-primary: "#ffffff",
                on-secondary: "#ffffff",

                tertiary-container: "#002113",
                on-tertiary-container: "#009668",

                error: "#ba1a1a",
                error-container: "#ffdad6",
                on-error-container: "#93000a"

            },

            borderRadius: {

                DEFAULT: "0.25rem",
                lg: "0.5rem",
                xl: "0.75rem",
                full: "9999px"

            },

            spacing: {

                base: "4px",
                xs: "8px",
                sm: "12px",
                md: "16px",
                lg: "24px",
                xl: "32px"

            },

            fontFamily: {

                body: ["Inter"],
                display: ["Inter"],
                headline: ["Inter"]

            }

        }

    }

}
</script>

<style>

body {
    -webkit-tap-highlight-color: transparent;
}

.hide-scrollbar::-webkit-scrollbar {
    display: none;
}

.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* =========================================================
   SIDEBAR
========================================================= */

.desktop-sidebar {
    width: 220px;
}

.sidebar-item {
    transition: all 0.2s ease;
}

.sidebar-item:hover {
    background: #f8fafc;
}

/* Active sidebar item */
.sidebar-item.active {
    background: #f1f5f9;
    color: #0f172a;
}

.sidebar-item.active:hover {
    background: #eaf0f6;
}

/* =========================================================
   MAIN CONTENT
========================================================= */

.main-content {
    margin-left: 220px;
}

/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .desktop-sidebar {
        display: none;
    }

    .main-content {
        margin-left: 0;
    }

}

</style>

</head>


<body class="bg-background text-on-background font-body min-h-screen">


<!-- =========================================================
     DESKTOP SIDEBAR
========================================================= -->

<aside
    class="desktop-sidebar fixed left-0 top-0 bottom-0 bg-white border-r border-slate-200 z-50 flex flex-col px-4 py-6"
>


    <!-- =====================================================
         LOGO
    ====================================================== -->

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



    <!-- =====================================================
         NAVIGATION
    ====================================================== -->

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



        <!-- STUDY MATERIAL - ACTIVE -->

        <a
            href="study-hub.php"
            class="sidebar-item active flex items-center gap-3 w-full h-[52px] px-4 rounded-xl"
        >

            <span class="material-symbols-outlined text-[22px] shrink-0">
                auto_stories
            </span>

            <span class="text-[13px] font-semibold">
                Study Material
            </span>

        </a>

    </nav>



    <!-- =====================================================
         PROFILE AT BOTTOM
    ====================================================== -->

    <div class="mt-auto pt-5 border-t border-slate-100">

        <a
            href="student_profile.php"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 transition"
        >


            <!-- PROFILE IMAGE -->

            <div
                class="w-10 h-10 rounded-full overflow-hidden border border-slate-200 bg-slate-100 shrink-0"
            >

                <!-- Backend পরে এখানে বসবে -->

                <div class="w-full h-full flex items-center justify-center">

                    <span class="material-symbols-outlined text-slate-400">
                        person
                    </span>

                </div>

            </div>



            <!-- USER INFO -->

            <div class="min-w-0">

                <p class="text-[12px] font-semibold text-slate-800 truncate">
                    Student Name
                </p>

                <p class="text-[10px] text-slate-400 mt-0.5">
                    3rd Semester
                </p>

            </div>

        </a>

    </div>

</aside>



<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<main
    class="main-content min-h-screen px-6 md:px-10 pt-8 pb-24 md:pb-8"
>


    <div class="max-w-7xl mx-auto flex flex-col gap-6">


        <!-- =================================================
             SEARCH + FILTER
        ================================================== -->

        <section class="flex flex-col md:flex-row gap-3 items-center">

            <div class="relative w-full flex-1">

                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500"
                >
                    search
                </span>

                <input
                    type="text"
                    placeholder="Search courses, topics, or file types..."
                    class="w-full h-[44px] pl-10 pr-4 bg-[#F1F5F9] border-transparent focus:border-[#0A192F] focus:bg-white focus:ring-0 rounded text-[14px] text-slate-800 outline-none transition-all"
                >

            </div>


            <button
                class="flex items-center gap-2 px-4 h-[44px] bg-[#F1F5F9] hover:bg-slate-200 text-slate-700 rounded transition-colors w-full md:w-auto justify-center border border-transparent"
            >

                <span class="material-symbols-outlined text-[20px]">
                    filter_list
                </span>

                <span class="text-[14px]">
                    Filters
                </span>

            </button>

        </section>



        <!-- =================================================
             FILTER CHIPS
        ================================================== -->

        <section
            class="flex gap-2 overflow-x-auto hide-scrollbar py-1"
        >

            <button
                class="px-3 py-1.5 rounded-full bg-slate-200 text-slate-800 text-[12px] font-semibold whitespace-nowrap border border-transparent hover:border-slate-400 transition-colors shrink-0"
            >
                Lecture Note
            </button>

            <button
                class="px-3 py-1.5 rounded-full bg-slate-200 text-slate-800 text-[12px] font-semibold whitespace-nowrap border border-transparent hover:border-slate-400 transition-colors shrink-0"
            >
                PDF
            </button>

            <button
                class="px-3 py-1.5 rounded-full bg-slate-200 text-slate-800 text-[12px] font-semibold whitespace-nowrap border border-transparent hover:border-slate-400 transition-colors shrink-0"
            >
                Assignment
            </button>

            <button
                class="px-3 py-1.5 rounded-full bg-slate-200 text-slate-800 text-[12px] font-semibold whitespace-nowrap border border-transparent hover:border-slate-400 transition-colors shrink-0"
            >
                Syllabus
            </button>

        </section>



        <!-- =================================================
             MATERIAL GRID
        ================================================== -->

        <section
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4"
        >


            <!-- =================================================
                 CARD 1
            ================================================== -->

            <div
                class="bg-white border border-[#E2E8F0] rounded-lg p-4 flex flex-col gap-3 hover:shadow-[0px_8px_24px_rgba(10,25,47,0.12)] transition-shadow duration-300"
            >

                <div class="flex justify-between items-start">

                    <span
                        class="px-2 py-1 rounded bg-[#E2E8F0] text-slate-600 text-[10px] font-bold uppercase tracking-wider"
                    >
                        PDF
                    </span>

                    <button class="text-slate-500 hover:text-slate-900">

                        <span class="material-symbols-outlined text-[20px]">
                            more_vert
                        </span>

                    </button>

                </div>


                <div>

                    <p class="text-[12px] font-semibold text-slate-500 mb-1">
                        Data Structures (CSE205)
                    </p>

                    <h3 class="text-[16px] font-semibold text-slate-900">
                        Trees &amp; Graphs Advanced Algorithms
                    </h3>

                </div>


                <div
                    class="mt-auto pt-3 border-t border-slate-200 flex justify-between items-center"
                >

                    <span class="text-[14px] text-slate-500">
                        2.4 MB
                    </span>

                    <div class="flex gap-2">

                        <button
                            aria-label="View"
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition-colors text-slate-800"
                        >

                            <span class="material-symbols-outlined text-[20px]">
                                visibility
                            </span>

                        </button>


                        <button
                            aria-label="Download"
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition-colors text-slate-800"
                        >

                            <span class="material-symbols-outlined text-[20px]">
                                download
                            </span>

                        </button>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 CARD 2
            ================================================== -->

            <div
                class="bg-white border border-[#E2E8F0] rounded-lg p-4 flex flex-col gap-3 hover:shadow-[0px_8px_24px_rgba(10,25,47,0.12)] transition-shadow duration-300"
            >

                <div class="flex justify-between items-start">

                    <span
                        class="px-2 py-1 rounded bg-secondary-container text-slate-700 text-[10px] font-bold uppercase tracking-wider"
                    >
                        Lecture Note
                    </span>

                    <button class="text-slate-500 hover:text-slate-900">

                        <span class="material-symbols-outlined text-[20px]">
                            more_vert
                        </span>

                    </button>

                </div>


                <div>

                    <p class="text-[12px] font-semibold text-slate-500 mb-1">
                        Discrete Math (CSE103)
                    </p>

                    <h3 class="text-[16px] font-semibold text-slate-900">
                        Combinatorics Midterm Review Session Notes
                    </h3>

                </div>


                <div
                    class="mt-auto pt-3 border-t border-slate-200 flex justify-between items-center"
                >

                    <span class="text-[14px] text-slate-500">
                        1.1 MB
                    </span>

                    <div class="flex gap-2">

                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition-colors text-slate-800"
                        >

                            <span class="material-symbols-outlined text-[20px]">
                                visibility
                            </span>

                        </button>


                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition-colors text-slate-800"
                        >

                            <span class="material-symbols-outlined text-[20px]">
                                download
                            </span>

                        </button>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 CARD 3
            ================================================== -->

            <div
                class="bg-white border border-[#E2E8F0] rounded-lg p-4 flex flex-col gap-3 hover:shadow-[0px_8px_24px_rgba(10,25,47,0.12)] transition-shadow duration-300"
            >

                <div class="flex justify-between items-start">

                    <span
                        class="px-2 py-1 rounded bg-red-100 text-red-700 text-[10px] font-bold uppercase tracking-wider"
                    >
                        Assignment
                    </span>

                    <button class="text-slate-500 hover:text-slate-900">

                        <span class="material-symbols-outlined text-[20px]">
                            more_vert
                        </span>

                    </button>

                </div>


                <div>

                    <p class="text-[12px] font-semibold text-slate-500 mb-1">
                        Database Systems (CSE301)
                    </p>

                    <h3 class="text-[16px] font-semibold text-slate-900">
                        Project Phase 1: ER Diagram Submission Guidelines
                    </h3>

                </div>


                <div
                    class="mt-auto pt-3 border-t border-slate-200 flex justify-between items-center"
                >

                    <span class="text-[14px] text-red-600 font-medium">
                        Due in 2 days
                    </span>

                    <div class="flex gap-2">

                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition-colors text-slate-800"
                        >

                            <span class="material-symbols-outlined text-[20px]">
                                visibility
                            </span>

                        </button>


                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition-colors text-slate-800"
                        >

                            <span class="material-symbols-outlined text-[20px]">
                                download
                            </span>

                        </button>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 CARD 4
            ================================================== -->

            <div
                class="bg-white border border-[#E2E8F0] rounded-lg p-4 flex flex-col gap-3 hover:shadow-[0px_8px_24px_rgba(10,25,47,0.12)] transition-shadow duration-300"
            >

                <div class="flex justify-between items-start">

                    <span
                        class="px-2 py-1 rounded bg-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider"
                    >
                        Syllabus
                    </span>

                    <button class="text-slate-500 hover:text-slate-900">

                        <span class="material-symbols-outlined text-[20px]">
                            more_vert
                        </span>

                    </button>

                </div>


                <div>

                    <p class="text-[12px] font-semibold text-slate-500 mb-1">
                        AI Fundamentals (CSE405)
                    </p>

                    <h3 class="text-[16px] font-semibold text-slate-900">
                        Fall 2024 Complete Course Outline &amp; Reading List
                    </h3>

                </div>


                <div
                    class="mt-auto pt-3 border-t border-slate-200 flex justify-between items-center"
                >

                    <span class="text-[14px] text-slate-500">
                        540 KB
                    </span>

                    <div class="flex gap-2">

                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition-colors text-slate-800"
                        >

                            <span class="material-symbols-outlined text-[20px]">
                                visibility
                            </span>

                        </button>


                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition-colors text-slate-800"
                        >

                            <span class="material-symbols-outlined text-[20px]">
                                download
                            </span>

                        </button>

                    </div>

                </div>

            </div>

        </section>

    </div>

</main>



<!-- =========================================================
     UPLOAD FAB
========================================================= -->

<button
    aria-label="Upload Material"
    class="fixed bottom-[84px] md:bottom-6 right-6 w-14 h-14 rounded-full bg-[#0A192F] text-white flex items-center justify-center shadow-[0px_8px_24px_rgba(10,25,47,0.12)] hover:scale-105 active:scale-95 transition-transform z-40"
>

    <span class="material-symbols-outlined text-[24px]">
        add
    </span>

</button>



<!-- =========================================================
     MOBILE BOTTOM NAV
========================================================= -->

<nav
    class="md:hidden fixed bottom-0 left-0 w-full z-50 flex justify-around items-center h-16 bg-white border-t border-slate-200"
>


    <!-- STUDY HUB ACTIVE -->

    <a
        href="study-hub.php"
        class="flex flex-col items-center justify-center text-slate-900 relative after:content-[''] after:absolute after:top-0 after:w-8 after:h-0.5 after:bg-slate-900 flex-1 h-full"
    >

        <span
            class="material-symbols-outlined text-[22px]"
            style="font-variation-settings: 'FILL' 1;"
        >
            auto_stories
        </span>

        <span class="text-[10px] font-semibold mt-1">
            Study Hub
        </span>

    </a>



    <!-- EXAM PREP -->

    <a
        href="exam-prep.php"
        class="flex flex-col items-center justify-center text-slate-500 opacity-70 flex-1 h-full"
    >

        <span class="material-symbols-outlined text-[22px]">
            quiz
        </span>

        <span class="text-[10px] font-semibold mt-1">
            Exam Prep
        </span>

    </a>



    <!-- ADVISOR -->

    <a
        href="advisor.php"
        class="flex flex-col items-center justify-center text-slate-500 opacity-70 flex-1 h-full"
    >

        <span class="material-symbols-outlined text-[22px]">
            psychology
        </span>

        <span class="text-[10px] font-semibold mt-1">
            Advisor
        </span>

    </a>



    <!-- PROFILE -->

    <a
        href="student_profile.php"
        class="flex flex-col items-center justify-center text-slate-500 opacity-70 flex-1 h-full"
    >

        <span class="material-symbols-outlined text-[22px]">
            person
        </span>

        <span class="text-[10px] font-semibold mt-1">
            Profile
        </span>

    </a>

</nav>


</body>
</html>