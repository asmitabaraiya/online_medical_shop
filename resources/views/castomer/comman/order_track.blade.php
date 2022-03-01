<!-- Modal -->
<div class="modal fade" id="OrderTrack" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <form  method="POST" action="{{route('order.track')}}" id="register_form" >
                @csrf
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="invoice_no" value="{{ old('invoice_no') }}" name="invoice_no" placeholder="Invoice No." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Invoice No.'">
                    @error('invoice_no')
                    <span class="text-danger">{{ $message }}</span>
                     @enderror
                </div>
                <button type="submit" class="button primary-btn">Go</button>

            </form>    

        </div>
       
      </div>
    </div>
  </div>