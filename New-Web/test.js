$(document).ready(function(){
    // Handle click on testimonial indicators
    $(".testimonial .indicators li").click(function(){
        var i = $(this).index();
        var targetElement = $(".testimonial .tabs li");
        
        // Activate the clicked indicator
        targetElement.eq(i).addClass('active');
        targetElement.not(targetElement[i]).removeClass('active');
        
        // Update the carousel to the corresponding slide
        $('#carouselExampleIndicators').carousel(i);
    });

    // Handle click on testimonial tabs
    $(".testimonial .tabs li").click(function(){
        var i = $(this).index();
        var targetElement = $(".testimonial .tabs li");
        
        // Activate the clicked tab
        targetElement.eq(i).addClass('active');
        targetElement.not($(this)).removeClass('active');
        
        // Update the carousel to the corresponding slide
        $('#carouselExampleIndicators').carousel(i);
    });

    // Update swiper pagination
    $(".slider .swiper-pagination span").each(function(i){
        $(this).text(i + 1).prepend("0");
    });

    // Function to show modal
    function showModal() {
        var modal = document.getElementById("testimonialCustomModal");
        modal.classList.add("show");
        modal.style.display = "block";
        var backdrop = document.createElement("div");
        backdrop.classList.add("modal-backdrop", "fade", "show");
        document.body.appendChild(backdrop);
    }

    // Event listener for showing the modal
    $("#writeTestimonialBtn").click(function() {
        showModal();
    });
});
