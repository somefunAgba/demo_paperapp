jQuery(document).ready(function ($) {

    if(localStorage.getItem("postl")) {
        var pls = localStorage.getItem("postl");
        $("#pl").text(pls);
    }
    if (localStorage.getItem("postd")) {
        var pds = localStorage.getItem("postd");
        $("#pd").text(pds);
    }

    var postl = $("#pl").attr('val');
    console.log(postl);

    var postd = $("#pd").attr('val');
    console.log(postd);

    $('.fa-thumbs-up').click(function () {
        postl++;
        localStorage.setItem("postl", postl);
        $("#pl").text(postl);
        console.log(postl);
    });

    $('.fa-thumbs-down').click(function () {
        postd++;
        $("#pd").text(postd);
        localStorage.setItem("postd", postd);
        console.log(postd);
    });

    var thisPost = -1; var prePost = -2; var afterPost = 0;

    wp.posts().embed().get()
        .then(function (data) {
            populatePost(data[++prePost], data[++thisPost], data[++afterPost]);
            $("#next").click(function () {
                populatePost(data[++prePost], data[++thisPost], data[++afterPost]);
            });
            $("#prev").click(function () {
                populatePost(data[--prePost], data[--thisPost], data[--afterPost]);
            });
    });

    function populatePost(prev, curr, next) {
            const date = new Date(curr.date); //format date
            // swap out the html placeholders with content from WPAPI
            $(".api-post-title").html(curr.title.rendered);
            $(".api-post-meta-author").html(curr._embedded.author[0].name);
            $(".api-post-meta-date").html(date.toLocaleDateString());
            $(".api-post-content").html(curr.content.rendered);
            //$(".api-btn-prev").off('click');

            // for the first post
            if (prev && next) {
                $(".api-btn-prev").prop("disabled", false)
                    .text(prev.title.rendered); // set the button text to title of prev post;
                $(".api-btn-next").prop("disabled", false)
                    .text(next.title.rendered); // set the button text to title of next post
            } else if ( !prev && next){
                $(".api-btn-prev").prop("disabled", true)
                    .text(""); // set the button text to title of prev post
                $(".api-btn-next").text(next.title.rendered); // set the button text to title of next post
            } else if ( !next && prev) {
                $(".api-btn-next").prop("disabled", true)
                    .text(""); // set the button text to title of prev post
                $(".api-btn-prev").text(prev.title.rendered); // set the button text to title of prev post

            } else {
                // do nothing

            }
            window.scrollTo(0,0); // Go back to the Page top after loading
        }

});
