<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>CampusMind AI - Admin Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "background": "#f7f9fb",
                        "on-primary-fixed-variant": "#39475f",
                        "surface-dim": "#d8dadc",
                        "on-secondary-fixed-variant": "#38485d",
                        "surface": "#f7f9fb",
                        "on-tertiary": "#ffffff",
                        "error-container": "#ffdad6",
                        "surface-bright": "#f7f9fb",
                        "surface-container-highest": "#e0e3e5",
                        "on-background": "#191c1e",
                        "surface-container-high": "#e6e8ea",
                        "surface-container-low": "#f2f4f6",
                        "on-primary-container": "#76849f",
                        "surface-tint": "#515f78",
                        "secondary": "#505f76",
                        "on-primary-fixed": "#0d1c32",
                        "on-surface-variant": "#44474d",
                        "on-primary": "#ffffff",
                        "secondary-fixed-dim": "#b7c8e1",
                        "surface-variant": "#e0e3e5",
                        "on-tertiary-fixed-variant": "#005236",
                        "surface-container": "#eceef0",
                        "inverse-surface": "#2d3133",
                        "tertiary-container": "#002113",
                        "error": "#ba1a1a",
                        "on-tertiary-fixed": "#002113",
                        "inverse-primary": "#b9c7e4",
                        "tertiary-fixed": "#6ffbbe",
                        "on-error-container": "#93000a",
                        "on-secondary": "#ffffff",
                        "on-tertiary-container": "#009668",
                        "secondary-fixed": "#d3e4fe",
                        "primary": "#000000",
                        "tertiary-fixed-dim": "#4edea3",
                        "on-surface": "#191c1e",
                        "primary-fixed-dim": "#b9c7e4",
                        "inverse-on-surface": "#eff1f3",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed": "#d6e3ff",
                        "outline": "#75777e",
                        "on-error": "#ffffff",
                        "tertiary": "#000000",
                        "outline-variant": "#c5c6cd",
                        "primary-container": "#0d1c32",
                        "on-secondary-container": "#54647a",
                        "on-secondary-fixed": "#0b1c30",
                        "secondary-container": "#d0e1fb"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "lg": "24px",
                        "xs": "8px",
                        "base": "4px",
                        "sm": "12px",
                        "xl": "32px",
                        "md": "16px",
                        "gutter": "12px",
                        "container-margin": "16px"
                    },
                    "fontFamily": {
                        "display-mobile": ["Inter"],
                        "body-lg": ["Inter"],
                        "display-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "body-sm": ["Inter"],
                        "label-caps": ["Inter"]
                    },
                    "fontSize": {
                        "display-mobile": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                        "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "display-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "body-sm": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
                        "label-caps": ["12px", { "lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600" }]
                    }
                }
            }
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .fill-icon {
            font-variation-settings: 'FILL' 1;
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-lg antialiased overflow-hidden flex h-screen">
<!-- TopNavBar (Mobile Only) -->
<nav class="md:hidden w-full bg-surface-container-lowest border-b border-outline-variant shadow-sm px-md py-sm flex justify-between items-center fixed top-0 z-50">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-primary text-2xl">school</span>
<span class="font-headline-md text-headline-md text-primary font-bold">CampusMind AI</span>
</div>
<button class="text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined text-2xl">menu</span>
</button>
</nav>
<!-- SideNavBar (Desktop) -->
<aside class="hidden md:flex flex-col h-full p-md gap-sm bg-surface border-r border-outline-variant w-64 docked left-0 z-40 relative">
<div class="flex items-center gap-sm px-xs pt-xs pb-lg mb-sm border-b border-outline-variant/30">
<div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-on-primary text-xl fill-icon">school</span>
</div>
<div class="flex flex-col">
<span class="font-headline-md text-body-lg font-bold text-primary truncate">CSE Department</span>
<span class="font-body-sm text-label-caps text-on-surface-variant truncate">Admin Console</span>
</div>
</div>
<div class="flex-1 overflow-y-auto pr-xs custom-scrollbar flex flex-col gap-xs">
<!-- Active Tab -->
<a class="flex items-center gap-sm px-sm py-xs bg-secondary-container text-on-secondary-container rounded-lg font-bold scale-95 transition-transform duration-150 group" href="#">
<span class="material-symbols-outlined fill-icon">dashboard</span>
<span class="font-body-sm text-body-sm">Dashboard</span>
</a>
<!-- Inactive Tabs -->
<a class="flex items-center gap-sm px-sm py-xs text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary transition-colors duration-200">menu_book</span>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors duration-200">Curriculum</span>
</a>
<a class="flex items-center gap-sm px-sm py-xs text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary transition-colors duration-200">quiz</span>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors duration-200">Question Bank</span>
</a>
<a class="flex items-center gap-sm px-sm py-xs text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary transition-colors duration-200">verified_user</span>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors duration-200">Approvals</span>
</a>
<a class="flex items-center gap-sm px-sm py-xs text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary transition-colors duration-200">analytics</span>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors duration-200">Reports</span>
</a>
</div>
<div class="pt-sm border-t border-outline-variant/30 flex flex-col gap-xs mt-auto">
<button class="w-full bg-primary text-on-primary font-body-sm text-body-sm py-xs px-sm rounded-lg hover:bg-on-primary-fixed-variant transition-colors flex items-center justify-center gap-xs shadow-sm mb-sm">
<span class="material-symbols-outlined text-sm">add_circle</span>
                Generate Report
            </button>
<a class="flex items-center gap-sm px-sm py-xs text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary transition-colors duration-200">help</span>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors duration-200">Help Center</span>
</a>
<a class="flex items-center gap-sm px-sm py-xs text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary transition-colors duration-200">logout</span>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors duration-200">Logout</span>
</a>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 overflow-y-auto pt-[72px] md:pt-0 bg-background h-full">
<div class="max-w-[1280px] mx-auto p-md md:p-xl space-y-lg">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-sm mb-xl">
<div>
<h1 class="font-display-lg text-display-lg text-primary tracking-tight">CampusMind AI</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-1">Admin Dashboard Overview</p>
</div>
<div class="flex items-center gap-sm">
<div class="relative hidden md:block">
<span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="pl-xl pr-sm py-xs bg-surface-container-low border border-outline-variant rounded-full text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none w-64 transition-all" placeholder="Search resources..." type="text"/>
</div>
<button class="w-10 h-10 rounded-full bg-surface-container-lowest border border-outline-variant flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors relative">
<span class="material-symbols-outlined">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center border border-outline-variant/50 overflow-hidden cursor-pointer">
<img alt="Administrator Profile" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCC7KlD8517g3r6YE0D1czCS_iWck1be1fN3Z1jhDhTIgJVF4y3MH5j8EjJGZTD1izWJ5TZhjne_XTjOpXM3Y2sNU5aOqYT1qm_ldRiZVkAbjlCfzqNORUQDed5WBRq8VAzP6zfWJwQNsT36C6nLHVs67FLnRTGHwKDy4ubivlM2jtY75sD4mQQgqzROgm4svASAOe44T9cJiUntXMUORL-LirzfGuWEtMHQ0tH_H4HDSQO9D-wfkXI3Q"/>
</div>
</div>
</div>
<!-- Dashboard Grid Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
<!-- Left Column (Syllabus & Approvals) -->
<div class="lg:col-span-8 flex flex-col gap-lg">
<!-- Syllabus & Course Manager Bento Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0px_2px_4px_rgba(10,25,47,0.05)] overflow-hidden flex flex-col hover:shadow-[0px_8px_24px_rgba(10,25,47,0.08)] transition-shadow duration-300">
<div class="p-lg border-b border-outline-variant/50 flex justify-between items-center bg-surface-bright">
<div class="flex items-center gap-sm">
<div class="w-10 h-10 rounded-lg bg-secondary-fixed/50 flex items-center justify-center text-primary">
<span class="material-symbols-outlined fill-icon">library_books</span>
</div>
<div>
<h2 class="font-headline-md text-headline-md text-primary">Syllabus &amp; Course Manager</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Manage active curriculum and course outlines</p>
</div>
</div>
<button class="hidden sm:flex bg-primary text-on-primary font-body-sm text-body-sm py-2 px-4 rounded-lg hover:bg-on-primary-fixed-variant transition-colors items-center gap-xs">
<span class="material-symbols-outlined text-sm">upload_file</span>
                                Upload New Syllabus
                            </button>
</div>
<div class="p-md">
<div class="grid grid-cols-1 md:grid-cols-2 gap-sm">
<!-- Course Item 1 -->
<div class="group border border-outline-variant/60 rounded-lg p-sm hover:border-primary/50 hover:bg-surface-container-low transition-all cursor-pointer relative overflow-hidden">
<div class="absolute right-0 top-0 bottom-0 w-1 bg-tertiary-fixed-dim rounded-r-lg"></div>
<div class="flex justify-between items-start mb-sm">
<div class="flex items-center gap-xs">
<span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-caps text-label-caps uppercase">CSE 101</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-caps text-label-caps">Fall 2024</span>
</div>
<button class="text-on-surface-variant group-hover:text-primary transition-colors">
<span class="material-symbols-outlined text-xl">more_vert</span>
</button>
</div>
<h3 class="font-headline-md text-body-lg text-primary mb-1">Introduction to Computer Science</h3>
<div class="flex items-center gap-sm mt-3">
<div class="flex-1 h-1.5 bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-tertiary-fixed-dim w-[85%]"></div>
</div>
<span class="font-body-sm text-label-caps text-on-surface-variant">85% Complete</span>
</div>
<div class="mt-4 flex gap-xs">
<button class="flex-1 py-1.5 border border-outline-variant rounded text-on-surface-variant font-body-sm text-label-caps hover:bg-surface-container hover:text-primary transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">edit</span> Edit Curriculum
                                        </button>
</div>
</div>
<!-- Course Item 2 -->
<div class="group border border-outline-variant/60 rounded-lg p-sm hover:border-primary/50 hover:bg-surface-container-low transition-all cursor-pointer relative overflow-hidden">
<div class="absolute right-0 top-0 bottom-0 w-1 bg-tertiary-fixed-dim rounded-r-lg"></div>
<div class="flex justify-between items-start mb-sm">
<div class="flex items-center gap-xs">
<span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-caps text-label-caps uppercase">CSE 205</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-caps text-label-caps">Fall 2024</span>
</div>
<button class="text-on-surface-variant group-hover:text-primary transition-colors">
<span class="material-symbols-outlined text-xl">more_vert</span>
</button>
</div>
<h3 class="font-headline-md text-body-lg text-primary mb-1">Data Structures &amp; Algorithms</h3>
<div class="flex items-center gap-sm mt-3">
<div class="flex-1 h-1.5 bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-tertiary-fixed-dim w-[100%]"></div>
</div>
<span class="font-body-sm text-label-caps text-on-surface-variant">100% Complete</span>
</div>
<div class="mt-4 flex gap-xs">
<button class="flex-1 py-1.5 border border-outline-variant rounded text-on-surface-variant font-body-sm text-label-caps hover:bg-surface-container hover:text-primary transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">edit</span> Edit Curriculum
                                        </button>
</div>
</div>
</div>
<button class="sm:hidden w-full mt-md bg-primary text-on-primary font-body-sm text-body-sm py-2 rounded-lg hover:bg-on-primary-fixed-variant transition-colors flex items-center justify-center gap-xs">
<span class="material-symbols-outlined text-sm">upload_file</span>
                                Upload New Syllabus
                            </button>
</div>
</div>
<!-- Document Approval Hub Table Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0px_2px_4px_rgba(10,25,47,0.05)] overflow-hidden flex flex-col flex-1">
<div class="p-lg border-b border-outline-variant/50 flex justify-between items-center bg-surface-bright">
<div class="flex items-center gap-sm">
<div class="w-10 h-10 rounded-lg bg-error-container/50 flex items-center justify-center text-error">
<span class="material-symbols-outlined fill-icon">fact_check</span>
</div>
<div>
<h2 class="font-headline-md text-headline-md text-primary">Document Approval Hub</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Pending Verifications for student submissions</p>
</div>
</div>
<button class="text-primary font-body-sm text-body-sm hover:underline">View All</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-outline-variant/50 bg-surface-container-low/50">
<th class="py-sm px-lg font-label-caps text-label-caps text-on-surface-variant font-semibold uppercase tracking-wider">Document Name</th>
<th class="py-sm px-lg font-label-caps text-label-caps text-on-surface-variant font-semibold uppercase tracking-wider hidden sm:table-cell">Submitter</th>
<th class="py-sm px-lg font-label-caps text-label-caps text-on-surface-variant font-semibold uppercase tracking-wider hidden lg:table-cell">Date</th>
<th class="py-sm px-lg font-label-caps text-label-caps text-on-surface-variant font-semibold uppercase tracking-wider text-center">Status</th>
<th class="py-sm px-lg font-label-caps text-label-caps text-on-surface-variant font-semibold uppercase tracking-wider text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
<tr class="hover:bg-surface-container-lowest/80 transition-colors group">
<td class="py-sm px-lg">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-outline">description</span>
<span class="font-body-sm text-body-sm font-medium text-primary">Graph Theory Notes_v2.pdf</span>
</div>
</td>
<td class="py-sm px-lg hidden sm:table-cell font-body-sm text-body-sm text-on-surface-variant">A. Rahman (ID: 211)</td>
<td class="py-sm px-lg hidden lg:table-cell font-body-sm text-body-sm text-on-surface-variant">Oct 24, 2023</td>
<td class="py-sm px-lg text-center">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-fixed/50 text-on-secondary-fixed">Pending</span>
</td>
<td class="py-sm px-lg text-right">
<div class="flex justify-end gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
<button class="w-8 h-8 rounded-full flex items-center justify-center bg-tertiary-fixed-dim/20 text-tertiary-fixed-dim hover:bg-tertiary-fixed-dim hover:text-on-tertiary-fixed transition-colors" title="Approve">
<span class="material-symbols-outlined text-sm">check</span>
</button>
<button class="w-8 h-8 rounded-full flex items-center justify-center bg-error-container/50 text-error hover:bg-error hover:text-on-error transition-colors" title="Reject">
<span class="material-symbols-outlined text-sm">close</span>
</button>
</div>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/80 transition-colors group">
<td class="py-sm px-lg">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-outline">description</span>
<span class="font-body-sm text-body-sm font-medium text-primary">Algorithm_CheatSheet.docx</span>
</div>
</td>
<td class="py-sm px-lg hidden sm:table-cell font-body-sm text-body-sm text-on-surface-variant">S. Hossain (ID: 198)</td>
<td class="py-sm px-lg hidden lg:table-cell font-body-sm text-body-sm text-on-surface-variant">Oct 23, 2023</td>
<td class="py-sm px-lg text-center">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-fixed/50 text-on-secondary-fixed">Pending</span>
</td>
<td class="py-sm px-lg text-right">
<div class="flex justify-end gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
<button class="w-8 h-8 rounded-full flex items-center justify-center bg-tertiary-fixed-dim/20 text-tertiary-fixed-dim hover:bg-tertiary-fixed-dim hover:text-on-tertiary-fixed transition-colors" title="Approve">
<span class="material-symbols-outlined text-sm">check</span>
</button>
<button class="w-8 h-8 rounded-full flex items-center justify-center bg-error-container/50 text-error hover:bg-error hover:text-on-error transition-colors" title="Reject">
<span class="material-symbols-outlined text-sm">close</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Right Column (AI Trainer Configuration) -->
<div class="lg:col-span-4 flex flex-col">
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0px_2px_4px_rgba(10,25,47,0.05)] overflow-hidden flex flex-col sticky top-md">
<div class="p-lg border-b border-outline-variant/50 bg-surface-bright">
<div class="flex items-center gap-sm mb-xs">
<span class="material-symbols-outlined text-primary fill-icon text-xl">model_training</span>
<h2 class="font-headline-md text-headline-md text-primary">AI Question Pattern Trainer</h2>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">Configure benchmarks for AI question generation to ensure academic rigor.</p>
</div>
<div class="p-lg space-y-md">
<!-- Input Group 1 -->
<div class="space-y-xs">
<label class="block font-label-caps text-label-caps text-on-surface-variant uppercase">Short Questions (2 Marks)</label>
<div class="relative">
<input class="w-full bg-surface-container-low border border-outline-variant/60 rounded-lg py-2 px-3 text-body-lg focus:bg-surface-container-lowest focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all h-[44px]" type="number" value="10"/>
<span class="absolute right-3 top-1/2 -translate-y-1/2 font-body-sm text-on-surface-variant pointer-events-none">Qts/Paper</span>
</div>
<p class="text-xs text-outline font-body-sm">Focus: Knowledge recall &amp; basic understanding.</p>
</div>
<!-- Input Group 2 -->
<div class="space-y-xs">
<label class="block font-label-caps text-label-caps text-on-surface-variant uppercase">Descriptive Questions (5 Marks)</label>
<div class="relative">
<input class="w-full bg-surface-container-low border border-outline-variant/60 rounded-lg py-2 px-3 text-body-lg focus:bg-surface-container-lowest focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all h-[44px]" type="number" value="4"/>
<span class="absolute right-3 top-1/2 -translate-y-1/2 font-body-sm text-on-surface-variant pointer-events-none">Qts/Paper</span>
</div>
<p class="text-xs text-outline font-body-sm">Focus: Application &amp; detailed explanation.</p>
</div>
<!-- Input Group 3 -->
<div class="space-y-xs">
<label class="block font-label-caps text-label-caps text-on-surface-variant uppercase">Analytical Questions (10 Marks)</label>
<div class="relative">
<input class="w-full bg-surface-container-low border border-outline-variant/60 rounded-lg py-2 px-3 text-body-lg focus:bg-surface-container-lowest focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all h-[44px]" type="number" value="2"/>
<span class="absolute right-3 top-1/2 -translate-y-1/2 font-body-sm text-on-surface-variant pointer-events-none">Qts/Paper</span>
</div>
<p class="text-xs text-outline font-body-sm">Focus: Synthesis, evaluation &amp; complex problem solving.</p>
</div>
<!-- Chips for Context -->
<div class="pt-sm pb-xs">
<span class="block font-label-caps text-label-caps text-on-surface-variant uppercase mb-2">Target Cognitive Levels</span>
<div class="flex flex-wrap gap-2">
<span class="px-2.5 py-1 rounded-full bg-surface-container-high border border-outline-variant/30 text-on-surface-variant font-label-caps text-[10px] tracking-wide">Remembering</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-high border border-outline-variant/30 text-on-surface-variant font-label-caps text-[10px] tracking-wide">Understanding</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container-high border border-outline-variant/30 text-on-surface-variant font-label-caps text-[10px] tracking-wide">Applying</span>
</div>
</div>
</div>
<div class="p-md border-t border-outline-variant/50 bg-surface-container-low/30 mt-auto">
<button class="w-full bg-primary text-on-primary font-headline-md text-body-lg font-semibold py-3 rounded-lg hover:bg-on-primary-fixed-variant transition-colors flex items-center justify-center gap-sm shadow-[0px_4px_12px_rgba(10,25,47,0.15)] hover:shadow-[0px_6px_16px_rgba(10,25,47,0.2)] active:scale-[0.98]">
<span class="material-symbols-outlined text-xl">save</span>
                                Save Pattern
                            </button>
</div>
</div>
</div>
</div>
</div>
</main>
</body></html>