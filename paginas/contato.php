<div class= 'caixa-contato'>
        <div>
            <h1 class="font-contato"><strong>Contact us</strong></h1>
            <h2 class="font-contato">Please, fill in the form below:</h2>
            <br>
        </div> 
        <form nome="formulario" method="post" action="#">
            <div class="campo">
                <input type="text" name="nome" id="nome" placeholder="Name*" size="45" maxlength="150" autocomplete="off" required>
            <div>
            <div class="campo">
                <input type="email" name="email" id="email" placeholder="E-mail*" size="45" minlength="10" autocomplete="off" required>
            </div>
            <div class="campo">
                <input type="text" name="assunto" id="assunto" placeholder="Topic*" size="45" maxlength="150" autocomplete="off" required>
            </div>
            <div class="campo">
                <br>
                <textarea rows="8" style="width: 26em" type="text" id="mensagem" name="mensagem" placeholder="Message" autocomplete="off"></textarea>
            </div>
            <div class="campo">
                <button class="botao" type="button" onClick="messageSent()" title="enviar">
                <i class="fa fa-paper-plane icone" aria-hidden="true"></i>Send</button> 
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>                
            </div>         
        </form> 
<div>
