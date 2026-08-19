<!DOCTYPE html><html class="light" lang="en"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>CampusMind AI - Profile Setup</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-container": "#d0e1fb",
                        "primary": "#000000",
                        "inverse-surface": "#2d3133",
                        "surface-container-highest": "#e0e3e5",
                        "surface-container-low": "#f2f4f6",
                        "primary-fixed-dim": "#b9c7e4",
                        "surface-tint": "#515f78",
                        "background": "#f7f9fb",
                        "secondary-fixed-dim": "#b7c8e1",
                        "secondary": "#505f76",
                        "on-tertiary-fixed": "#002113",
                        "surface-bright": "#f7f9fb",
                        "outline": "#75777e",
                        "on-secondary-container": "#54647a",
                        "tertiary": "#000000",
                        "on-primary-fixed": "#0d1c32",
                        "on-background": "#191c1e",
                        "on-surface": "#191c1e",
                        "on-primary": "#ffffff",
                        "on-secondary-fixed-variant": "#38485d",
                        "surface-container-lowest": "#ffffff",
                        "on-surface-variant": "#44474d",
                        "on-primary-container": "#76849f",
                        "surface-dim": "#d8dadc",
                        "surface": "#f7f9fb",
                        "on-error": "#ffffff",
                        "outline-variant": "#c5c6cd",
                        "on-tertiary": "#ffffff",
                        "on-tertiary-fixed-variant": "#005236",
                        "on-tertiary-container": "#009668",
                        "on-secondary": "#ffffff",
                        "inverse-primary": "#b9c7e4",
                        "secondary-fixed": "#d3e4fe",
                        "on-secondary-fixed": "#0b1c30",
                        "surface-container": "#eceef0",
                        "on-primary-fixed-variant": "#39475f",
                        "surface-container-high": "#e6e8ea",
                        "tertiary-container": "#002113",
                        "primary-fixed": "#d6e3ff",
                        "on-error-container": "#93000a",
                        "tertiary-fixed": "#6ffbbe",
                        "surface-variant": "#e0e3e5",
                        "primary-container": "#0d1c32",
                        "tertiary-fixed-dim": "#4edea3",
                        "error-container": "#ffdad6",
                        "error": "#ba1a1a",
                        "inverse-on-surface": "#eff1f3"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "base": "4px",
                        "lg": "24px",
                        "md": "16px",
                        "xl": "32px",
                        "sm": "12px",
                        "xs": "8px",
                        "gutter": "12px",
                        "container-margin": "16px"
                    },
                    "fontFamily": {
                        "body-lg": ["Inter"],
                        "display-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "display-mobile": ["Inter"],
                        "label-caps": ["Inter"],
                        "body-sm": ["Inter"]
                    },
                    "fontSize": {
                        "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "display-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "display-mobile": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                        "label-caps": ["12px", { "lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600" }],
                        "body-sm": ["14px", { "lineHeight": "20px", "fontWeight": "400" }]
                    }
                }
            }
        }
    </script>
<style>
    body { font-family: 'Inter', sans-serif; }
</style>
</head>
<body class="bg-background text-on-background min-h-screen pt-14 flex flex-col items-center pb-24">
<!-- TopAppBar -->
<header class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-container-margin h-14 bg-surface dark:bg-on-background shadow-sm text-primary dark:text-inverse-primary text-headline-md font-headline-md">
<div class="flex items-center gap-xs">
<span class="text-headline-md font-headline-md font-bold text-primary dark:text-on-primary-fixed">CampusMind AI</span>
</div>
<a href="profile.php" class="w-8 h-8 rounded-full overflow-hidden border border-outline-variant block">
<img alt="User profile photo" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDVxWBzxiKAFw-Hh1ir53wESNVrE_iL3zyLRFy9LaYWNHl_O0QeNvI2hgsPU9m58obLHeoPYiRo0gkmZ2HYXiY3dhGE3v8hSAP3XHCBFsKYPsRzYMgKd2HK4Hd-5Df7ecthohke4SYFcdAyZILFjobwYQIH2IB2ZlutU6XKZdGXpEzpbOUhr-2dqKy4eghuYJQG4iXrxwFmKI-uopcylfzCUYVQOolbjq1yF5gEgnu8urdXnWXmbFREGQ">
</a>
</header>
<!-- Main Content Canvas -->
<main class="w-full max-w-[1280px] px-md md:px-[40px] flex-grow flex flex-col items-center justify-center py-lg">
<div class="w-full max-w-2xl bg-surface-container-lowest rounded-lg border border-outline-variant shadow-sm p-lg">
<div class="mb-xl text-center">
<h1 class="font-display-mobile text-display-mobile md:font-display-lg md:text-display-lg text-primary mb-xs">Profile Setup</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant">Complete your profile to personalize your academic experience.</p>
</div>

<!-- Form added enctype="multipart/form-data" for file uploading -->
<form id="profileForm" action="save-profile.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-lg">

<!-- Profile Picture Upload Field -->
<div class="flex flex-col gap-base">
<label class="font-label-caps text-label-caps text-on-surface-variant" for="profilePic">Profile Picture <span class="text-on-surface-variant font-normal normal-case">(Optional)</span></label>
<input name="profilePic" class="h-[44px] bg-surface-container-low border-transparent focus:border-primary focus:bg-surface-container-lowest focus:ring-0 rounded px-sm font-body-sm text-on-surface transition-colors file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-surface-variant file:text-on-surface hover:file:bg-surface-container-highest cursor-pointer" id="profilePic" type="file" accept="image/*">
</div>

<!-- Name Field -->
<div class="flex flex-col gap-base">
<label class="font-label-caps text-label-caps text-on-surface-variant" for="fullName">Full Name</label>
<input name="fullName" class="h-[44px] bg-surface-container-low border-transparent focus:border-primary focus:bg-surface-container-lowest focus:ring-0 rounded px-sm font-body-lg text-body-lg text-on-surface transition-colors" id="fullName" placeholder="Enter your full name" type="text" required>
</div>

<!-- Department Field -->
<div class="flex flex-col gap-base">
<label class="font-label-caps text-label-caps text-on-surface-variant" for="department">Department</label>
<select name="department" class="h-[44px] bg-surface-container-low border-transparent focus:border-primary focus:bg-surface-container-lowest focus:ring-0 rounded px-sm font-body-lg text-body-lg text-on-surface transition-colors appearance-none" id="department">
<option value="Computer Science & Engineering">Computer Science & Engineering</option>
<option value="Electrical & Electronic Engineering">Electrical & Electronic Engineering</option>
<option value="Natural Fiber Engineering">Natural Fiber Engineering</option>
<option value="Business Administration">Business Administration</option>
</select>
</div>

<!-- Semester Dropdown -->
<div class="flex flex-col gap-base">
<label class="font-label-caps text-label-caps text-on-surface-variant" for="semester">Current Semester</label>
<select name="semester" class="h-[44px] bg-surface-container-low border-transparent focus:border-primary focus:bg-surface-container-lowest focus:ring-0 rounded px-sm font-body-lg text-body-lg text-on-surface transition-colors appearance-none" id="semester" required>
<option disabled="" selected="" value="">Select Semester</option>
<option value="1st">1st Semester</option>
<option value="2nd">2nd Semester</option>
<option value="3rd">3rd Semester</option>
<option value="4th">4th Semester</option>
<option value="5th">5th Semester</option>
<option value="6th">6th Semester</option>
<option value="7th">7th Semester</option>
<option value="8th">8th Semester</option>
</select>
</div>

<!-- CGPA (Optional) -->
<div class="flex flex-col gap-base">
<div class="flex justify-between items-end">
<label class="font-label-caps text-label-caps text-on-surface-variant" for="cgpa">Current CGPA <span class="text-on-surface-variant font-normal normal-case">(Optional)</span></label>
<span class="font-body-sm text-body-sm text-outline">For 2nd semester and above</span>
</div>
<input name="cgpa" class="h-[44px] bg-surface-container-low border-transparent focus:border-primary focus:bg-surface-container-lowest focus:ring-0 rounded px-sm font-body-lg text-body-lg text-on-surface transition-colors" id="cgpa" max="4.00" min="0" placeholder="e.g. 3.50" step="0.01" type="number">
</div>

<!-- Skills Tag Area (Dynamic) -->
<div class="flex flex-col gap-base">
<label class="font-label-caps text-label-caps text-on-surface-variant" for="skillInput">Current Skills</label>
<div id="skillsContainer" class="min-h-[88px] bg-surface-container-low border-transparent focus-within:border-primary focus-within:bg-surface-container-lowest rounded p-sm border transition-colors flex flex-wrap content-start gap-xs cursor-text" onclick="document.getElementById('skillInput').focus();">
    <input type="hidden" name="skills" id="skillsHiddenInput">
    <input class="flex-grow bg-transparent border-none p-0 focus:ring-0 font-body-lg text-body-lg text-on-surface min-w-[150px]" id="skillInput" placeholder="Type a skill and press Enter..." type="text">
</div>
</div>

<!-- Career Goal (Optional) -->
<div class="flex flex-col gap-base">
<label class="font-label-caps text-label-caps text-on-surface-variant" for="goal">Primary Career Goal <span class="text-on-surface-variant font-normal normal-case">(Optional)</span></label>
<textarea name="goal" class="bg-surface-container-low border-transparent focus:border-primary focus:bg-surface-container-lowest focus:ring-0 rounded p-sm font-body-lg text-body-lg text-on-surface transition-colors resize-y" id="goal" placeholder="What are you aiming for after graduation?..." rows="3"></textarea>
</div>

<!-- Action Button -->
<div class="mt-md pt-lg border-t border-outline-variant flex justify-end">
<button class="bg-[#0A192F] hover:bg-opacity-90 text-on-primary h-[48px] px-xl rounded font-headline-md text-headline-md transition-all active:scale-95 shadow-[0px_8px_24px_rgba(10,25,47,0.12)] flex items-center justify-center" type="submit">Save Profile</button>
</div>
</form>
</div>
</main>

<!-- BottomNavBar -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center h-16 pb-safe bg-surface-container-lowest dark:bg-inverse-surface border-t border-outline-variant dark:border-outline md:hidden">
<a class="flex flex-col items-center justify-center text-secondary dark:text-secondary-fixed-dim opacity-70 hover:bg-surface-container-low dark:hover:bg-surface-container-highest active:scale-90 transition-transform duration-200 w-full h-full" href="study-hub.html">
<span class="material-symbols-outlined mb-1" data-icon="auto_stories">auto_stories</span>
<span class="text-label-caps font-label-caps">Study Hub</span>
</a>
<a class="flex flex-col items-center justify-center text-secondary dark:text-secondary-fixed-dim opacity-70 hover:bg-surface-container-low dark:hover:bg-surface-container-highest active:scale-90 transition-transform duration-200 w-full h-full" href="exam-prep.html">
<span class="material-symbols-outlined mb-1" data-icon="quiz">quiz</span>
<span class="text-label-caps font-label-caps">Exam Prep</span>
</a>
<a class="flex flex-col items-center justify-center text-secondary dark:text-secondary-fixed-dim opacity-70 hover:bg-surface-container-low dark:hover:bg-surface-container-highest active:scale-90 transition-transform duration-200 w-full h-full" href="advisor.php">
<span class="material-symbols-outlined mb-1" data-icon="psychology">psychology</span>
<span class="text-label-caps font-label-caps">Advisor</span>
</a>
<a class="flex flex-col items-center justify-center text-primary dark:text-primary-fixed-dim relative after:content-[''] after:absolute after:top-0 after:w-8 after:h-0.5 after:bg-primary dark:after:bg-primary-fixed-dim hover:bg-surface-container-low dark:hover:bg-surface-container-highest active:scale-90 transition-transform duration-200 w-full h-full" href="profile.php">
<span class="material-symbols-outlined mb-1 text-primary" data-icon="person" data-weight="fill" style="font-variation-settings: 'FILL' 1;">person</span>
<span class="text-label-caps font-label-caps">Profile</span>
</a>
</nav>

<!-- JavaScript for Dynamic Skills Tagging -->
<script>
const skillInput = document.getElementById('skillInput');
const skillsContainer = document.getElementById('skillsContainer');
const skillsHiddenInput = document.getElementById('skillsHiddenInput');

let skills = [];

skillInput.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' || e.key === ',') {
        e.preventDefault();
        const val = skillInput.value.trim();
        if (val && !skills.includes(val)) {
            skills.push(val);
            renderSkills();
        }
        skillInput.value = '';
    }
});

function renderSkills() {
    const existingTags = skillsContainer.querySelectorAll('.skill-tag');
    existingTags.forEach(tag => tag.remove());

    skills.forEach((skill, index) => {
        const tag = document.createElement('span');
        tag.className = "skill-tag inline-flex items-center gap-base px-sm py-1 bg-surface-variant rounded-full font-body-sm text-body-sm text-on-surface";
        tag.innerHTML = `${skill} <button type="button" class="material-symbols-outlined text-[16px] leading-none hover:text-error transition-colors" onclick="removeSkill(${index})">close</button>`;
        skillsContainer.insertBefore(tag, skillInput);
    });

    skillsHiddenInput.value = skills.join(', ');
}

function removeSkill(index) {
    skills.splice(index, 1);
    renderSkills();
}
</script>

</body></html>