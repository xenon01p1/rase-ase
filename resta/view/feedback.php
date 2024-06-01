<div class="py-2"></div>

<div class="container">
        <!-- Cart Wrapper -->
        <div class="cart-wrapper-area">
          
            <div class="cart-table card mb-3">
              <div class="card-body border-top">
                <form id="form_feedback" enctype="multipart/form-data" method="post">
                  <label class="form-label" for="feedback_content">Write your feedback for us </label><br>
                  <textarea name="feedback_content" id="feedback_content" class="form-control" required></textarea><br>

                  <input type="file" name="feedback_file[]" class="form-control" multiple required><br>

                  <input class="btn text-white w-100 mt-1" type="submit" value="Submit Feedback" style="background-color: #6b462c;">
                </form>
                
              </div>
            </div>
          
        </div>
      </div>
    
<div class="py-2"></div>
<script src="../controller/controller_feedback.js"></script>