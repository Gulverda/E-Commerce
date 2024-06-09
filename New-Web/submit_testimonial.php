<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submit Testimonial</title>
    <link rel="stylesheet" href="testimonial.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Submit Your Testimonial</h3>
                    <button type="button" class="btn btn-primary" id="writeTestimonialBtn" onclick="showModal()">Write Testimonial</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="testimonialCustomModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimonialCustomModalLabel">Write Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()" style="width: auto; display: flex; justify-content: flex-end;">
    <span aria-hidden="true">&times;</span>
</button>

                </div>
                <div class="modal-body">
                    <form action="submit_testimonial.php" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <select class="form-control" id="rating" name="rating" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image_url">Image URL:</label>
                            <input type="text" class="form-control" id="image_url" name="image_url">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Function to show the modal
    function showModal() {
        var modal = document.getElementById("testimonialCustomModal");
        modal.classList.add("show");
        modal.style.display = "block";

        // Add event listener to close the modal when clicking outside
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });
    }

    // Function to close the modal when clicking the close button
    function closeModal() {
        var modal = document.getElementById("testimonialCustomModal");
        var backdrop = document.querySelector(".modal-backdrop");
        modal.classList.remove("show");
        modal.style.display = "none";
        backdrop.remove();
    }
</script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-gLZv5b3Pw8ZWWt+xzvX4l6+d5gG6yy9t+Plll+ZCi6dkArIkGzgyjzjG5z0ncHq4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shCk5W8OZkUpn/nfmDJdk4Joic+V+E0n0nXZ" crossorigin="anonymous"></script>
</body>
</html>
