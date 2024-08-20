$(document).ready(function () {
    // function for_disabled_right_click(){
    //     document.addEventListener('contextmenu', function(e) {
    //         e.preventDefault();
    //     });
    //     document.addEventListener('keydown', function(e) {
    //         if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.keyCode === 73))) {
    //             e.preventDefault();
    //         }
    //     });
    // }
    // for_disabled_right_click();
    function technology_management() {
        fetch_technology();
        // Add technology
        $("#technology_form").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "insert_technology.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    console.log(response);
                    fetch_technology();
                    $("#add_technology").modal("hide");
                    alert(response);
                }
            })
        })
        // Fetch Edit Data
        $(document).on("click", ".edit-technology", function () {
            let id = $(this).data("id");
            let technology = $(this).data("technology");
            $("#edit_technology_id").val(id);
            $("#edit_technology").val(technology);

            $("#edit_technology_modal").modal("show");
        })
        $("#edit_technology_form").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "update_technology.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    console.log(response);
                    fetch_technology();
                    $("#edit_technology_modal").modal("hide");
                    alert(response);
                }
            })
        })
        function fetch_technology() {
            $.ajax({
                url: "fetch_technology.php",
                type: "POST",
                success: function (response) {
                    console.log(response);
                    $("#technology_table").html(response);
                }
            })
        }
        fetch_technology();
    }
    technology_management();

    function course_management() {
        fetch_course();
        // Add Course
        $("#course_form").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "insert_course.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    console.log(response);
                    fetch_course();
                    $("#add_course").modal("hide");
                    alert(response);
                }
            })
        })
        // Fetch Edit Data
        $(document).on("click", ".edit-course", function () {
            let id = $(this).data("id");
            let course = $(this).data("course");
            let technology = $(this).data("technology");

            $("#edit_course_id").val(id);
            $("#edit_course").val(course);
            $("#edit_technology").val(technology); // This sets the selected technology

            $("#edit_course_modal").modal("show");
        });
        // Update 
        $("#edit_course_form").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "update_course.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    console.log(response);
                    fetch_course();
                    $("#edit_course_modal").modal("hide");
                    alert(response);
                }
            })
        })
        function fetch_course() {
            $.ajax({
                url: "fetch_course.php",
                type: "POST",
                success: function (response) {
                    console.log(response);
                    $("#courses_table").html(response);
                }
            })
        }
        fetch_course();
    }
    course_management();

    function lecture_management() {
        fetch_lecture();
        // When the form is submitted
        $('#lectureForm').submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Create a FormData object with the form data
            var formData = new FormData(this);

            // Validation for thumbnail and video files
            var thumbnail = $('#thumbnail')[0].files[0];
            var video = $('#video')[0].files[0];
            var valid = true;

            // Check if the thumbnail is provided and has a valid image type
            if (thumbnail) {
                var validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if ($.inArray(thumbnail.type, validImageTypes) < 0) {
                    alert("Invalid thumbnail file type. Please select a JPEG, PNG, or GIF image.");
                    valid = false;
                }
            } else {
                alert("Please select a thumbnail image.");
                valid = false;
            }

            // Check if the video is provided and has a valid video type
            if (video) {
                var validVideoTypes = ['video/mp4', 'video/webm', 'video/ogg'];
                if ($.inArray(video.type, validVideoTypes) < 0) {
                    alert("Invalid video file type. Please select an MP4, WEBM, or OGG video.");
                    valid = false;
                }
            } else {
                alert("Please select a video file.");
                valid = false;
            }

            // If validation passes, proceed with the AJAX request
            if (valid) {
                $.ajax({
                    url: "insert_lecture.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        fetch_lecture();
                        $("#add_lecture").modal("hide");
                        alert(response);
                        $("#lectureForm").trigger("reset");
                    },
                    error: function (xhr, status, error) {
                        // Handle any errors
                        console.error("An error occurred: " + status + " " + error);
                        alert("An error occurred while inserting the lecture.");
                    }
                });
            }
        });
        $(document).on("click", ".view-course", function () {
            let id = $(this).data("id");
            let course = $(this).data("course");
            let lecture_title = $(this).data("lecture_title");
            let lecture_desc = $(this).data("lecture_desc");
            let thumbnailPath = $(this).data("thumbnail");
            let videoPath = $(this).data("video");
            let status = $(this).data("status");

            // Update video player source and poster image
            $("#view_video").attr("src", videoPath);
            $("#view_video_player").attr("poster", thumbnailPath);

            // Load the video to ensure it updates with the new source
            $("#view_video_player")[0].load();

            // Set lecture details in the modal
            $("#view_lec_id").html(id);
            $("#view_lec_title").html(lecture_title);
            $("#view_lec_desc").html(lecture_desc);
            $("#view_course").html(course);
            $("#view_status").html(status);
            let statusElement = $("#view_status");
            statusElement.html(status); // Set the status text
            if (status === "disabled") {
                statusElement.css("color", "red");
            } else {
                statusElement.css("color", "green");
            }

            // Show the modal
            $("#ViewLectureModal").modal("show");
        });
        $(document).on("click", ".edit-course", function () {
            let id = $(this).data("id");
            let course = $(this).data("course");
            let lecture_title = $(this).data("lecture_title");
            let lecture_desc = $(this).data("lecture_desc");
            let thumbnailPath = $(this).data("thumbnail");
            let videoPath = $(this).data("video");

            // Update video player source and poster image
            $("#edit_video_play").attr("src", videoPath);
            $("#edit_thumbnail_display").attr("poster", thumbnailPath);

            // Load the video to ensure it updates with the new source
            $("#edit_thumbnail_display")[0].load();

            // Set lecture details in the modal
            $("#edit_lecture_id").val(id);
            $("#edit_lecture_id_t_v").val(id);
            $("#edit_lecture_title").val(lecture_title);
            $("#edit_lecture_desc").val(lecture_desc);
            $("#edit_course").val(course);
            $("#edit_lecture_course").val(course);
            // Show the modal
            $("#edit_course_modal").modal("show");
        });
        $("#video_thumbnail_form").on("submit", function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Create a FormData object with the form data
            var formData = new FormData(this);

            // Validation for thumbnail and video files
            var thumbnail = $('#edit_thumbnail')[0].files[0];
            var video = $('#edit_video')[0].files[0];
            var valid = true;

            // Thumbnail validation
            if (thumbnail) {
                var validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if ($.inArray(thumbnail.type, validImageTypes) < 0) {
                    alert("Invalid thumbnail file type. Please select a JPEG, PNG, or GIF image.");
                    valid = false;
                }
            }

            // Video validation
            if (video) {
                var validVideoTypes = ['video/mp4', 'video/webm', 'video/ogg'];
                if ($.inArray(video.type, validVideoTypes) < 0) {
                    alert("Invalid video file type. Please select an MP4, WEBM, or OGG video.");
                    valid = false;
                }

                // Video size validation (e.g., max size of 50MB)
                var maxSizeInBytes = 50 * 1024 * 1024; // 50MB
                if (video.size > maxSizeInBytes) {
                    alert("Video file is too large. Please select a video less than 50MB.");
                    valid = false;
                }
            }

            // If validation passes, proceed with the AJAX request
            if (valid) {
                $.ajax({
                    url: "update_video_thumbnail.php", // Adjust this URL to match your backend endpoint
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        fetch_lecture(); // Assuming this is a function that reloads or refreshes the lectures
                        $("#edit_course_modal").modal("hide"); // Hide the modal after success
                        alert(response);
                        $("#video_thumbnail_form").trigger("reset"); // Reset the form after submission
                    },
                    error: function (xhr, status, error) {
                        // Handle any errors
                        console.error("An error occurred: " + status + " " + error);
                        alert("An error occurred while updating the video and thumbnail.");
                    }
                });
            }
        });
        $("#edit_lectureForm").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "update_lecture.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    console.log(response);
                    fetch_lecture();
                    $("#edit_course_modal").modal("hide");
                    alert(response);
                }
            })
        });
        function fetch_lecture() {
            $.ajax({
                url: "fetch_lecture.php",
                type: "POST",
                success: function (response) {
                    console.log(response)
                    $("#lectures_table").html(response);
                }
            })
        }
        fetch_lecture();
    }
    lecture_management();

    function user_management() {
        $("#user_form").on("submit", function (e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: "insert_user.php",
                type: "POST",
                data: formData,
                contentType: false,  // Necessary for file uploads
                processData: false,  // Necessary for file uploads
                success: function (response) {
                    console.log(response);
                    fetch_user();
                    $("#add_user").modal("hide");
                    alert(response);
                    $("#user_form").trigger("reset");
                },
                error: function (xhr, status, error) {
                    console.error("An error occurred: " + status + " " + error);
                    alert("Failed to add user.");
                }
            });
        });
        $(document).on("click", ".view-user", function () {
            let id = $(this).data("id");
            let name = $(this).data("name");
            let email = $(this).data("email");
            let password = $(this).data("password");
            let image = $(this).data("image");
            $("#view_user_id").text(id);
            $("#view_user_name").text(name);
            $("#view_user_email").text(email);
            $("#view_user_password").text(password);
            $("#view_user_image").attr("src", image);
            $("#View_user").modal("show");
        });
        $(document).on("click", ".edit-user", function () {
            let id = $(this).data("id");
            let name = $(this).data("name");
            let email = $(this).data("email");
            let password = $(this).data("password");
            let image = $(this).data("image");
            $("#edit_user_id").val(id);
            $("#edit_user_image_id").val(id);
            $("#edit_user_name").val(name);
            $("#edit_user_email").val(email);
            $("#edit_user_image_email").val(email);
            $("#edit_user_password").val(password);
            $("#display_user_image").attr("src", image);
            $("#edit_user").modal("show");
        });
        $("#edit_user_form").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "update_user.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    console.log(response);
                    fetch_user();
                    $("#edit_user").modal("hide");
                    alert(response);
                }
            });
        });
        $("#profile_form").on("submit", function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "update_user_image.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    fetch_user();
                    $("#edit_user").modal("hide");
                    alert(response);
                }
            });
        });
        function fetch_user() {
            $.ajax({
                url: "fetch_user.php",
                type: "POST",
                success: function (response) {
                    console.log(response);
                    $("#users_table").html(response);
                }
            });
        }
        fetch_user();

    }
    user_management();

    function project_mangement() {
        fetch_project();
        $('#projectForm').submit(function (event) {
            event.preventDefault();

            var Form_data = new FormData(this);

            var thumbnail = $('#project_thumbnail')[0].files[0];
            var video = $('#project_video')[0].files[0];
            var valid = true;

            var validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            var validVideoTypes = ['video/mp4', 'video/webm', 'video/ogg'];

            if (!thumbnail || !validImageTypes.includes(thumbnail.type.toLowerCase())) {
                alert("Invalid thumbnail file type. Please select a JPEG, PNG, or GIF image.");
                valid = false;
            }

            if (!video || !validVideoTypes.includes(video.type.toLowerCase())) {
                alert("Invalid video file type. Please select an MP4, WEBM, or OGG video.");
                valid = false;
            }

            if (valid) {
                $.ajax({
                    url: "insert_project.php",
                    type: "POST",
                    data: Form_data,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        fetch_project();
                        $("#add_project").modal("hide");
                        alert(response);
                        $("#projectForm").trigger("reset");
                    },
                    error: function (xhr, status, error) {
                        console.error("An error occurred: " + status + " " + error);
                        alert("An error occurred while inserting the Project.");
                    }
                });
            }
        });
        $(document).on("click", ".view-project", function () {
            let id = $(this).data("id");
            let title = $(this).data("title");
            let desc = $(this).data("desc");
            let thumbnail = $(this).data("thumbnail");
            let video = $(this).data("video");
            let status = $(this).data("status");

            // Update video player source and poster image
            $("#view_video").attr("src", video);
            $("#view_video_player").attr("poster", thumbnail);

            // Load the video to ensure it updates with the new source
            $("#view_video_player")[0].load();

            // Set lecture details in the modal
            $("#view_lec_id").html(id);
            $("#view_project_title").html(title);
            $("#view_project_desc").html(desc);
            $("#view_project_status").html(status);
            let statusElement = $("#view_project_status");
            statusElement.html(status); // Set the status text
            if (status === "disabled") {
                statusElement.css("color", "red");
            } else {
                statusElement.css("color", "green");
            }

            // Show the modal
            $("#ViewProject").modal("show");
        });
        $(document).on("click", ".edit-project", function () {
            let id = $(this).data("id");
            let title = $(this).data("title");
            let desc = $(this).data("desc");
            let thumbnail = $(this).data("thumbnail");
            let video = $(this).data("video");

            // Update video player source and poster image
            $("#edit_video_play").attr("src", video);
            $("#edit_thumbnail_display").attr("poster", thumbnail);

            // Load the video to ensure it updates with the new source
            $("#edit_thumbnail_display")[0].load();

            // Set lecture details in the modal
            $("#edit_project_id_v_t").val(id);
            $("#edit_project_id").val(id);
            $("#edit_project_title").val(title);
            $("#edit_project_desc").val(desc);
            // Show the modal
            $("#edit_project").modal("show");
        });
        $("#project_video_thumbnail_form").on("submit", function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            var thumbnail = $('#edit_project_thumbnail')[0].files[0];
            var video = $('#edit_project_video')[0].files[0];
            var valid = true;

            if (thumbnail) {
                var validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if ($.inArray(thumbnail.type, validImageTypes) < 0) {
                    alert("Invalid thumbnail file type. Please select a JPEG, PNG, or GIF image.");
                    valid = false;
                }
            }

            if (video) {
                var validVideoTypes = ['video/mp4', 'video/webm', 'video/ogg'];
                if ($.inArray(video.type, validVideoTypes) < 0) {
                    alert("Invalid video file type. Please select an MP4, WEBM, or OGG video.");
                    valid = false;
                }

                var maxSizeInBytes = 50 * 1024 * 1024; // 50MB
                if (video.size > maxSizeInBytes) {
                    alert("Video file is too large. Please select a video less than 50MB.");
                    valid = false;
                }
            }

            if (valid) {
                $.ajax({
                    url: "update_project_video_thumbnail.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        fetch_project();
                        $("#edit_project").modal("hide");
                        alert(response);
                        $("#project_video_thumbnail_form").trigger("reset");
                    },
                    error: function (xhr, status, error) {
                        // Handle any errors
                        console.error("An error occurred: " + status + " " + error);
                        alert("An error occurred while updating the video and thumbnail.");
                    }
                });
            }
        });
        $("#edit_project_form").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "update_project.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    console.log(response);
                    fetch_project();
                    $("#edit_project").modal("hide");
                    alert(response);
                    $("#edit_project_form").trigger("reset");
                }
            })
        });
        function fetch_project() {
            $.ajax({
                url: "fetch_project.php",
                type: "POST",
                success: function (response) {
                    console.log(response);
                    $("#project_table").html(response);
                }
            });
        }
        fetch_project();
    }
    project_mangement();

    $("#header_toggler").on("click", function() {
        $("#header").toggleClass("active");
    });
    $("#mainContent").on("click", function() {
        $("#header").removeClass("active");
    });
    
});