<!-- Modal -->
<div class="modal fade" id="loginAlert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
          <h5 class="modal-title fs-5" id="exampleModalLabel">Log In or Sign Up to Continue</h5>
      
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-footer">
            <a href="{{ route('login') }}">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Click to Login</button>
            </a>
            <a href="{{ route('registration') }}">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Click to Sign Up</button>
            </a>
        
        
      </div>
    </div>
  </div>
</div>