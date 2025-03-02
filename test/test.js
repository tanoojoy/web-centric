//$(document).ready(function() {
//$('.search-box').focus();
//});

const wrapper = document.querySelector(".wrapper");
const header = document.querySelector(".header");
var filter = {
        "employment_type":[],
        "work_level":[],
        "salary_range":[]
    };

wrapper.addEventListener("scroll", (e) => {
    e.target.scrollTop > 30 ? header.classList.add("header-shadow") : header.classList.remove("header-shadow");
});

const toggleButton = document.querySelector(".dark-light");

toggleButton.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
});

const jobCards = document.querySelectorAll(".job-card");
const logo = document.querySelector(".logo");
const jobLogos = document.querySelector(".job-logos");
const jobDetailTitle = document.querySelector(".job-explain-content .job-card-title");
const jobBg = document.querySelector(".job-bg");

jobCards.forEach((jobCard) => {
    jobCard.addEventListener("click", () => {
        const number = Math.floor(Math.random() * 10);
        const url = `https://unsplash.it/640/425?image=${number}`;
        jobBg.src = url;

        const title = jobCard.querySelector(".job-card-title");
        jobDetailTitle.textContent = title.textContent;
        jobLogos.innerHTML = logo.outerHTML;
        wrapper.classList.add("detail-page");
        wrapper.scrollTop = 0;
    });
});

logo.addEventListener("click", () => {
 wrapper.classList.remove("detail-page");
 wrapper.scrollTop = 0;
   jobBg.style.background = bg;
});

$(".job-overview-card").click(function(){
    var body = {
        "job_id" : $(this).attr("id").split("_")[1]
    };

    var settings = {
        "url": "backend/get_one_job.php",
        "method": "POST",
        "data": JSON.stringify(body)
    };

    $.ajax(settings).done(function(response){
        // response = JSON.parse(response);

        // console.log(response);
    })
})

$(".type-container input").change(function(){
    if ($(this).is(":checked")) {
        if($(this).attr("id") == 'fulltime'){
            filter.employment_type.push("Full Time");
        }
        else if($(this).attr("id") == 'parttime'){
            filter.employment_type.push("Part Time");
        }
        else if($(this).attr("id") == 'internship'){
            filter.employment_type.push("Internship");
        }
        else if($(this).attr("id")== 'student'){
            filter.work_level.push("Student Level");
        }
        else if($(this).attr("id") == 'entry'){
            filter.work_level.push("Entry Level");
        }
        else if($(this).attr("id")== 'mid'){
            filter.work_level.push("Mid Level");
        }
        else if($(this).attr("id")== 'senior'){
            filter.work_level.push("Senior Level");
        }
    }
    else {
        if($(this).attr("id") == 'fulltime'){
            var index = filter.employment_type.indexOf("Full Time");
            filter.employment_type.splice(index, 1);
        }
        else if($(this).attr("id") == 'parttime'){
            var index = filter.employment_type.indexOf("Part Time");
            filter.employment_type.splice(index, 1);
        }
        else if($(this).attr("id") == 'internship'){
            var index = filter.employment_type.indexOf("Internship");
            filter.employment_type.splice(index, 1);
        }
        else if($(this).attr("id")== 'student'){
            var index = filter.work_level.indexOf("Student Level");
            filter.work_level.splice(index, 1);
        }
        else if($(this).attr("id") == 'entry'){
            var index = filter.work_level.indexOf("Entry Level");
            filter.work_level.splice(index, 1);
        }
        else if($(this).attr("id")== 'mid'){
            var index = filter.work_level.indexOf("Mid Level");
            filter.work_level.splice(index, 1);
        }
        else if($(this).attr("id")== 'senior'){
            var index = filter.work_level.indexOf("Senior Level");
            filter.work_level.splice(index, 1);
        }
    }

    var settings = {
        "url": "backend/filter.php",
        "method": "POST",
        "data": JSON.stringify(filter),
        "headers": {
            "Content-Type": "application/json"
        }
    };

    $.ajax(settings).done(function(response){
        response = JSON.parse(response);
        var jobCards = $(".job-cards");
        jobCards.empty();
        if(response.length > 0){
            
            response.forEach(job => {
                jobCards.append(job);
            });

            var count = $("#result_count").val();
            $(".searched-show").html("Showing " + count + " results")
        }
        else{
            $(".searched-show").html("No results found");
        }
    })
});
