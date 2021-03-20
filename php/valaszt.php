<div class="container-fluid">
  <div class="row">
    <div class="col-2" >        
    </div>
    <div class="col-8">
    <label>Pilóta:</label>
      <form class="form-group" action="pilotavalasztas.php" method="post">
        <select name="pilota1">
          <option value="-1">---Válassz---</option>
          <?php
          echo $html;            
          ?>
          <input type="hidden" name="id" id="id">
        </select>
        <select name="pilota2">
          <option value="-1">---Válassz---</option>
          <?php
          echo $html;
          ?>
        </select>
        <button type="submit" style="color: white; background-color:red; border-color:black;">Küldés</button>
        
      </form>
    </div>
    <div class="col-2" >        
    </div>      
  </div>
</div>