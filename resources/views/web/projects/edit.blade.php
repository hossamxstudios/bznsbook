<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>Edit Project: {{ $project->name }} | Bzns Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="pt-5 position-relative">
            <div class="container py-5">
                <div class="row">
                    @include('web.sections.profile.side')
                    @include('web.sections.projects.update')
                </div>
            </div>
        </section>
<style>
    .skills-input-container {
        position: relative;
    }

    .skills-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .skill-tag {
        display: inline-flex;
        align-items: center;
        background: #f0f9ff;
        border: 1px solid #a6d5fa;
        color: #0d6efd;
        border-radius: 20px;
        padding: 3px 10px;
        margin-right: 5px;
    }

    .remove-tag {
        display: inline-flex;
        margin-left: 5px;
        cursor: pointer;
        color: #dc3545;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Skills tag input
    const skillsInput = document.getElementById('skills-input');
    const skillsTags = document.getElementById('skills-tags');
    const skillsHidden = document.getElementById('skills-hidden');
    const skills = [];

    function updateSkillsHidden() {
        skillsHidden.value = JSON.stringify(skills);
    }

    function addSkill(skill) {
        if (skill && !skills.includes(skill)) {
            skills.push(skill);
            updateSkillsHidden();

            const tagElement = document.createElement('div');
            tagElement.className = 'skill-tag';
            tagElement.innerHTML = `
                ${skill}
                <span class="remove-tag"><i class="bx bx-x"></i></span>
            `;

            tagElement.querySelector('.remove-tag').addEventListener('click', function() {
                const index = skills.indexOf(skill);
                if (index !== -1) {
                    skills.splice(index, 1);
                    updateSkillsHidden();
                    tagElement.remove();
                }
            });

            skillsTags.appendChild(tagElement);
        }
    }

    if (skillsInput) {
        skillsInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const skill = this.value.trim();
                if (skill) {
                    addSkill(skill);
                    this.value = '';
                }
            }
        });
    }

    // Initialize existing skills
    const existingSkills = @json($project->skills ?? []);
    if (existingSkills) {
        // Handle both string JSON format and array format
        try {
            let skillsArray = existingSkills;

            // If it's already a string (JSON), parse it
            if (typeof existingSkills === 'string') {
                skillsArray = JSON.parse(existingSkills);
            }

            // Now add each skill
            if (Array.isArray(skillsArray)) {
                skillsArray.forEach(skill => addSkill(skill));
            }
        } catch (e) {
            console.error('Error parsing skills:', e);
        }
    }
});
</script>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>
