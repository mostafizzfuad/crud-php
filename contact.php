<?php require "./includes/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white">
                <div class="card-header bg-success text-center">
                    <h2>Contact Form</h2>
                </div>
                <div class="card-body text-primary">
                    <form method="post" action="./contact_post.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" name="visitor_name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" name="visitor_email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" class="form-control" rows="6" placeholder="Write your message here ..." name="visitor_message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "./includes/footer.php" ?>