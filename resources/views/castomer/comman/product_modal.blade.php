<!-- Button trigger modal -->

  <!-- Modal -->

 
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span ></span></h5>
          <button type="button" class="btn-close" id="closeModel" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
                <div class="row">
                    <div class="col-md-6">   
                      <div class="grid" style="row-gap: 0;">
                        <div class="g-col-4">
                          <img id="pimg" src=""  class="card-img-top " alt="Product Image">
                        </div>
                       
                     </div>                 
                                                
                    </div>



                    <div class="col-md-6">

                        <div class="col-md 12">
                          <h5 id="pname"></h5>
                        </div>
                        <div class="col-md 12">
                          <p id="pcat"></p>
                        </div>
                        <div class="col-md 12 ">
                          <p > ₹<strong class="h4" id="pprice"></strong>&nbsp; ₹<del style="margin-left: 1" class="mx-3" id="oldprice"></del> </p>
                        </div>
                        <div class="col-md 12">
                            <p id="pstock"></p>
                        </div>

                        <div class="col-md 12 my-4" id="colorArea" >
                          <label for="exampleFormControlInput1" class="form-label">Color :</label>
                            <select class="form-select" aria-label="Default select example" id="color" name="color"  >
                            
                            </select>
                        </div>
                        
                        <div class = "form-group col-md 12">
                          <label for="exampleFormControlInput1" class="form-label">Qty :</label>
                            <input class="form-control form-control-sm" id="qty"   type="number" placeholder="Quantity" aria-label="Quantity" min="1">
                        </div>
                    </div>  

                </div>
        </div>

        <input type="hidden" id="product_id">

        <div class="modal-footer">
          <button type="button" class="button" onclick="addToCart()" >Add to Cart</button>
        </div>
      </div>
    </div>
  </div>

  