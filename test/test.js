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

function add_click_events(){
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
}

add_click_events();

//click on 1 job 
$(".job-overview-card").click(function(){
    var body = {
        "job_id" : $(this).attr("id").split("_")[1]
    };

    var settings = {
        "url": "api/get_one_job.php",
        "method": "POST",
        "data": JSON.stringify(body),
        "headers": {
            "Content-Type": "application/json"
        }
    };

    $.ajax(settings).done(function(response){
        response = JSON.parse(response);
        console.log(response.overview);
        $(".overview-text-subheader").html(response.overview);
        $(".overview-salary").html("Rs " + response.salary + "/month");
        $(".overview-experience").html(response.experience_needed);
        $(".overview-employment-type").html(response.employment_type + " job");
        $(".overview-work-level").html(response.work_level);
        $("#company-name").html(response.company_name);
        $(".job-logos").html("<img src=\"img/" + response.logo +"\" width=\"100\" height=\"100\"/>");
        $(".comp-location").html(response.location);
        $(".app-number").html(response.no_of_applications + " applications");
    })
})

//changes in filters
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
        repopulate_jobs(response);
    })
});

//search box press Enter OR press Find Job button
$(".search-button, .search-box").on('click keypress', function(event){
    if (event.type === 'click' || event.which === 13) {
        var data ={
            "job": $(".search-box").val()
        } ;

        var settings = {
            "url": "api/search_jobs.php",
            "method": "POST",
            "data": JSON.stringify(data),
            "headers":{
                "Content-Type": "application/json"
            }
        };

        $.ajax(settings).done(function(response){
            repopulate_jobs(response);
        })
    }
})

function repopulate_jobs(response){
    response = JSON.parse(response);
    var jobCards = $(".job-cards");
    var overview_cards = $(".job-overview-cards");

    jobCards.empty();
    overview_cards.empty();

    if(response.main.length > 0){
        response.main.forEach(job => {
            jobCards.append(job);
        });

        response.overview.forEach(job => {
            overview_cards.append(job);
        })

        var count = $("#result_count").val();
        $(".searched-show").html("Showing " + count + " results");
        add_click_events();
    }
    else{
        $(".searched-show").html("No results found");
    }
}
