<?php print_r($cat_details); ?>
<div class="container mt-5">
    <!-- header -->
    <div class="d-flex justify-content-between">
      <div class="row mx-2 d-inline">
        <h3 class="d-inline text-color"><?php echo $cat_details[0]['title']; ?></h3>
        <i 
        class="Cedit btn bi bi-pen-fill d-inline h5" 
        role="button"
        data-bs-toggle="modal" 
        data-bs-target="#InputModal"
        onclick = "edit(<?php echo $cat_details[0]['id']; ?>);"
        data-title ="<?php echo $cat_details[0]['title']; ?>"
        data-budget = "<?php echo $cat_details[0]['budget']; ?>"
        id = "C<?php echo $cat_details[0]['id']; ?>"
        >

        </i>
        <i class="bi bi-trash3-fill d-inline h5" 
        role="button"
        data-bs-toggle="modal" 
        data-bs-target="#DelModal"
        onclick = "del(<?php echo $cat_details[0]['id']; ?>);"
        id = "D<?php echo $cat_details[0]['id']; ?>"
        >

        </i>
      </div>
      <div>
        <button type="button" class="btn btn-primary">Add Expense</button>
      </div>
    </div>

    <div class="bg_expense px-5 rounded-3 mt-3 position-relative">
      <table class="table exp_table">
        <tr class="sticky-top bg_header">
          <th class="text-center p-3">Name</th>
          <th class="text-center p-3">Date</th>
          <th class="text-center p-3">Cost</th>
          <th class = "text-center p-3" colspan="2">Actions</th>
        </tr>
        <tr class="shadow">
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-pencil-square h5"></i></strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-x-square-fill h5"></i></strong></td>
        </tr>
        <tr class="shadow">
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-pencil-square h5"></i></strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-x-square-fill h5"></i></i></td>
        </tr>
        <tr class="shadow">
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-pencil-square h5"></i></strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-x-square-fill h5"></i></i></td>
        </tr>
        <tr class="shadow">
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-pencil-square h5"></i></strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-x-square-fill h5"></i></i></td>
        </tr>
        <tr class="shadow">
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-pencil-square h5"></i></strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-x-square-fill h5"></i></i></td>
        </tr>
        <tr class="shadow">
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong>wow</strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-pencil-square h5"></i></strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-x-square-fill h5"></i></i></td>
        </tr>
      </table>
    </div>

    <div class="row text-light pos_status position-absolute bottom-0 end-0 pb-4">
      <div class="text-color d-flex justify-content-end">
        <strong>Total Expense: 2130.00</strong>
      </div>
      <div class="text-color d-flex justify-content-end">
        <strong>Budget Remaining: <?php echo $cat_details[0]['budget']; ?></strong>
      </div>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="InputModal" tabindex="-1" aria-labelledby="InputModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-color">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            <h5 class="modal-title" id="InputModalTitleLabel">Create Category</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open("Category/input", 'id = "CForm" name = "CForm"') ;?>
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="CategoryName" aria-describedby="CategoryNameHelp" name = "title" required>
                    </div>
                    <div class="mb-3">
                        <label for="Budget" class="form-label">Budget</label>
                        <input type="number" class="form-control" id="Budget" name = "budget" required>
                    </div>
                    <input type="hidden" id="CId" name="CId" value="">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
                </form>
        </div>
    </div>
</div>


<!--Delete Modal -->
<div class="modal fade" id="DelModal" tabindex="-1" aria-labelledby="DelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-color">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            <h5 class="modal-title" id="DelModalTitleLabel">This would delete the expenses included in this category.</h5>
            </div>
            <div class="modal-body d-flex justify-content-end">
            <?php echo form_open("Expense/Cdelete/".$cat_details[0]['id']."/") ;?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Continue</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script src = "<?php echo base_url('assets/script/script.js')?>"></script>