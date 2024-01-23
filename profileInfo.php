<?php session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="icon" href="/img/iconoventana.png"> <!--Logo pestaña de ventana-->
    <link rel="stylesheet" type="text/css" href="css/styleprofcard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/profile1.js"></script>
</head>
<body>
    <?php
    //CENTRO DE CONTROL, SI CAMBIAS EL VALUE DE UNA VARIABLE CAMBIA EN EL DOCUMENTO ENTERO DONDE SE HACE REFERENCIA
    //Botones
    $btnModificarInfo = "btnModificarInfo";
    $btnGuardarInfo = "btnGuardarInfo";
    $btnCancelarInfo = "btnCancelarInfo";
    $btnModificarBanco = "btnModificarBanco";
    $btnGuardarBanco = "btnGuardarBanco";
    $btnCancelarBanco = "btnCancelarBanco";
    //Inclir archivo de cambios guardados
    //include("profileUpdate.php");
    ?>
    <button><a href="Index.html">Clíckame papá</a></button>
        <div class="col-xl-12 px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <!--Formulario de datos de usuario-->
                    <div class="card mb-4">
                        <div class="card-header">--Información Personal--</div>
                        <div class="card-body">
                            <form method="POST" id="formInfoid" name="formInfo" action="Index.html" onsubmit="return validarForm()">
                                <!-- Grupo Usuario, Nombre, Apellidos y Género-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6 col-xl-3" id="usuarioForm">
                                        <label class="small mb-1" id ="labelUsuario" for="inputUsername">Usuario:</label>
                                        <label class="formInfo" id="infoUsuario" style = "display:block;"><?php echo $_SESSION ['aliasPerfil']?></label>
                                        <input class="form-control" id="inputUsuario" name="inputUsuario" type="text" placeholder="Introduce tu usuario" value="<?php echo $_SESSION ['aliasPerfil']?>" style="display:none;" required>
                                    </div>
                                    <div class="col-md-6 col-xl-3" id="nombreForm">
                                        <label class="small mb-1" id ="labelNombre" for="inputName">Nombre:</label>
                                        <label class="formInfo" id="infoNombre" style = "display:block"><?php echo $_SESSION ['nombrePerfil']?></label>
                                        <input class="form-control" id="inputNombre" name="inputNombre" type="text" placeholder="Introduce tu nombre de pila" value="<?php echo $_SESSION ['nombrePerfil']?>" style="display:none;" required>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <label class="small mb-1" id ="labelApellidos" for="inputApellidos">Apellidos:</label>
                                        <label class="formInfo" id="infoApellidos" style = "display:block"><?php echo $_SESSION ['apellidosPerfil']?></label>
                                        <input class="form-control" id="inputApellidos" name="inputApellidos" type="text" placeholder="Introduce tus apellidos" value="<?php echo $_SESSION ['apellidosPerfil']?>" style="display:none;" required>
                                    </div>
                                    <div class="col-md-6 col-xl-2">
                                        <label class="small mb-1" id ="labelGenero" for="inputGenero">Género:</label>
                                        <label class="formInfo" id="infoGenero" style = "display:block"><?php echo $_SESSION ['generoPerfil']?></label>
                                        <input class="form-control" id="inputGenero" name="inputGenero" type="text" placeholder="Introduce tu género" value="<?php echo $_SESSION ['generoPerfil']?>" style="display:none;" required>
                                    </div>
                                </div>
                                <!-- FIN GRUPO-->

                                <!--Grupo password, confirmar password-->
                                <div class="row gx-3 mb-3" id="passwordForm" style="display: none;">
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6 col-xl-5">
                                            <label class="small mb-1" id ="infoPass1" name ="<?php echo $infoPass1?>" for="inputPass">Nueva contraseña:</label>
                                            <input class="form-control" id="inputPass1" name ="<?php echo $inputPass1?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" placeholder="Nueva contraseña">
                                        </div>
                                        <div class="col-md-6 col-xl-2"><br><br>
                                            <input type="checkbox" onclick="passmostrar()">Mostrar contraseñas
                                        </div>
                                        <div class="col-md-6 col-xl-5">
                                            <label class="small mb-1" id ="infoPass2" name ="<?php echo $infoPass2?>" for="confPass">Confirmar nueva contraseña:</label>
                                            <input class="form-control" id="inputPass2" name ="<?php echo $inputPass2?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" placeholder="Confirmar contraseña">
                                        </div>
                                    </div>
                                </div>
                                <!--FIN GRUPO-->

                                <!-- Grupo Dirección-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12 col-xl-6">
                                        <label class="small mb-1" id ="labelDireccion">Dirección:</label><br>
                                        <label class="formInfo" id="infoDireccion"><?php echo $_SESSION ['direccionPerfil']?></label>
                                        <input class="form-control" id="inputDireccion" type="text" placeholder="Introduce tu dirección" value="<?php echo $_SESSION ['direccionPerfil']?>" style="display:none;" required>
                                    </div>
                                    <div class="col-md-4 col-xl-2">
                                        <label class="small mb-1" id ="labelPostal">Código Postal:</label><br>
                                        <label class="formInfo" id="infoPostal"><?php echo $_SESSION ['postalPerfil']?></label>
                                        <input class="form-control" id="inputPostal" type="text" placeholder="Introduce tu código postal" value="<?php echo $_SESSION ['postalPerfil']?>" style="display:none;" required>
                                    </div>
                                    <div class="col-md-4 col-xl-2">
                                        <label class="small mb-1" id ="labelLocalidad">Localidad:</label><br>
                                        <label class="formInfo" id="infoLocalidad"><?php echo $_SESSION ['localidadPerfil']?></label>
                                        <input class="form-control" id="inputLocalidad" type="text" placeholder="Introduce tu localidad" value="<?php echo $_SESSION ['localidadPerfil']?>" style="display:none;" required>
                                    </div>
                                    <div class="col-md-4 col-xl-2">
                                        <label class="small mb-1" id ="labelProvincia">Provincia:</label><br>
                                        <label class="formInfo" id="infoProvincia"><?php echo $_SESSION ['provinciaPerfil']?></label>
                                        <input class="form-control" id="inputProvincia" type="text" placeholder="Introduce tu provincia" value="<?php echo $_SESSION ['provinciaPerfil']?>" style="display:none;" required>
                                    </div>
                                </div>
                                <!-- FIN GRUPO-->
                                <!-- Grupo Email, Teléfono, DNI-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12 col-xl-6">
                                        <label class="small mb-1" id ="labelEmail">Email:</label><br>
                                        <label class="formInfo" id="infoEmail"><?php echo $_SESSION ['emailPerfil']?></label>
                                        <input class="form-control" id="inputEmail" type="text" placeholder="Introduce tu Email" value="<?php echo $_SESSION ['emailPerfil']?>" style="display:none;" required>
                                    </div>
                                    <div class="col-md-6 col-xl-2">
                                        <label class="small mb-1" id ="labelTelf">Teléfono:</label><br>
                                        <label class="formInfo" id="infoTelf"><?php echo $_SESSION ['numtelfPerfil']?></label>
                                        <input class="form-control" id="inputTelf" type="text" placeholder="Introduce tu Teléfono" value="<?php echo $_SESSION ['numtelfPerfil']?>" style="display:none;" required>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <label class="small mb-1" id ="labelDni">DNI:</label><br>
                                        <label class="formInfo" id="infoDni"><?php echo $_SESSION ['dniPerfil']?></label>
                                        <input class="form-control" id="inputDni" type="text" placeholder="Introduce tu DNI" value="<?php echo $_SESSION ['dniPerfil']?>" style="display:none;" required>
                                    </div>
                                </div>
                                <!-- FIN GRUPO-->
                                <!-- Botón para HACER cambios-->
                                <button class="btn btn-primary" type="button" style="display: block;" id="<?php echo $btnModificarInfo?>" name="<?php echo $btnModificarInfo?>"
                                onclick="inputcoming('infoUsuario','inputUsuario'),
                                inputcoming('infoNombre','inputNombre'),
                                inputcoming('infoApellidos','inputApellidos'),
                                inputcoming('infoGenero','inputGenero'),
                                inputcoming('passwordForm','passwordForm'),
                                inputcoming('infoDireccion','inputDireccion'),
                                inputcoming('infoPostal','inputPostal'),
                                inputcoming('infoLocalidad','inputLocalidad'),
                                inputcoming('infoProvincia','inputProvincia'),
                                inputcoming('infoEmail','inputEmail'),
                                inputcoming('infoTelf','inputTelf'),
                                inputcoming('infoDni','inputDni'),
                                inputcoming('<?php echo $btnModificarInfo?>','<?php echo $btnGuardarInfo?>'),
                                inputcoming('<?php echo $btnCancelarInfo?>','<?php echo $btnCancelarInfo?>')">Modificar información personal</button>
                                <!-- Botón para GUARDAR cambios-->
                                <div class="row  gx-3 mb-3">
                                    <div class=" col-xl-4">
                                        <input class="btn btn-primary" type="submit" style="display:none;" id="<?php echo $btnGuardarInfo?>" name="<?php echo $btnGuardarInfo?>" value="Guardar tu info, malandrín de segunda">
                                    </div>
                                    <!-- Botón para CANCELAR cambios-->
                                    <div class="col-xl-4">
                                        <div class="col-xl-4"></div>
                                        <div class="col-xl-8">

                                        <button class="btn btn-primary" type="button" style="display:none;" id="<?php echo $btnCancelarInfo?>" name="<?php echo $btnCancelarInfo?>"
                                        onclick="inputcoming('inputUsuario','infoUsuario',),
                                        inputcoming('inputNombre','infoNombre',),
                                        inputcoming('inputApellidos','infoApellidos'),
                                        inputcoming('inputGenero','infoGenero'),
                                        inputcoming('passwordForm','infoGenero'),
                                        inputcoming('inputDireccion','infoDireccion'),
                                        inputcoming('inputPostal','infoPostal'),
                                        inputcoming('inputLocalidad','infoLocalidad'),
                                        inputcoming('inputProvincia','infoProvincia'),
                                        inputcoming('inputEmail','infoEmail'),
                                        inputcoming('inputTelf','infoTelf'),
                                        inputcoming('inputDni','infoDni'),
                                        inputcoming('<?php echo $btnGuardarInfo?>','<?php echo $btnModificarInfo?>'),
                                        inputcoming('<?php echo $btnCancelarInfo?>','<?php echo $btnModificarInfo?>')">Cancelar modificación</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- FIN de formulario de DATOS USUARIO-->
                        </div>
                    </div>
                    <div class="form.control">
                        <h5 id="titulousuarioForm" style="display: none;">Este campo debe contener:</h3>
                        <p id="minusculausuarioForm" class="invalid" style="display: none;">> Una letra en<b> MINUSCULA </b>como mínimo.</p>
                        <p id="mayusculausuarioForm" class="invalid" style="display: none;">> Una letra en<b> MAYUSCULA </b>como mínimo.</p>
                        <p id="numerousuarioForm" class="invalid" style="display: none;">> Un<b> NUMERO </b>como mínimo.</p>
                        <p id="nonumerousuarioForm" class="invalid" style="display: none;">><b> NO PUEDE </b>contener números.</p>
                        <p id="longitudusuarioForm15" class="invalid" style="display: none;">> <b>15 caracteres </b>como máximo.</p>
                        <p id="longitudusuarioForm30" class="invalid" style="display: none;">> <b>30 caracteres </b>como máximo.</p>
                        <p id="longitudusuarioForm50" class="invalid" style="display: none;">> <b>50 caracteres </b>como máximo.</p>
                        <p id="passnoigualusuarioForm" class="invalid" style="display: none;">> Las contraseñas <b>NO COINCIDEN</b>.</p>
                        <p id="passigualusuarioForm" class="valid" style="display: none;">> Las contraseñas <b>COINCIDEN</b>.</p>
                        <p id="emailusuarioForm" class="invalid" style="display: none;">> Un email <b>CORRECTO</b>. Ej: frostgames@info.com</p>
                        <p id="emailsiusuarioForm" class="valid" style="display: none;">> Su email es <b>CORRECTO</b>.</p>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">--Información Bancaria--</div>
                        <div class="card-body">
                            <form>
                                <!-- Grupo IBAN, NUMERO TARJETA, FECHA CADUCIDAD y CVC-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6 col-xl-3" id="usuarioForm">
                                        <label class="small mb-1" id ="labelIBAN" for="inputUsername">IBAN:</label><br>
                                        <label class="formInfo" id="infoIBA>">No se han introducido datos</label>
                                        <input class="form-control" id="inputIBAN" type="text" placeholder="Introduce el IBAN referente a tu banco" value="" style="display:none;" required>
                                    </div>
                                    <div class="col-md-6 col-xl-3" id="nombreForm">
                                        <label class="small mb-1" id ="labelNumtarjeta" for="inputName">Número de la tarjeta:</label><br>
                                        <label class="formInfo" id="infoNumtarjeta">No se han introducido datos</label>
                                        <input class="form-control" id="inputNumtarjeta" type="text" placeholder="Introduce el número de tu tarjeta" value="" style="display: none;" required>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <label class="small mb-1" id ="labelFechatarjeta" for="inputApellidos">Fecha de caducidad:</label><br>
                                        <label class="formInfo" id="infoFechatarjeta">No se han introducido datos</label>
                                        <input class="form-control" id="inputFechatarjeta" type="date" style="display:none;" required>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <label class="small mb-1" id ="labelCVC" for="inputGenero">CVC:</label><br>
                                        <label class="formInfo" id="infoCVC?>">No se han introducido datos</label>
                                        <input class="form-control" id="inputCVC?>" type="number" placeholder="Introduce el CVC de tu tarjeta" value="" style="display: none;" required>
                                    </div>
                                </div>
                                <!-- FIN GRUPO-->
                                <!-- Botón para HACER cambios en BANCO-->
                                <button class="btn btn-primary" type="button" style="display: block;" id="<?php echo $btnModificarBanco?>" name="<?php echo $btnModificarBanco?>"
                                onclick="inputcoming('infoIBAN','inputIBAN',),
                                inputcoming('infoNumtarjeta','inputNumtarjeta',),
                                inputcoming('infoFechatarjeta','inputFechatarjeta',),
                                inputcoming('infoCVC','inputCVC',),
                                inputcoming('<?php echo $btnModificarBanco?>','<?php echo $btnGuardarBanco?>'),
                                inputcoming('<?php echo $btnModificarBanco?>','<?php echo $btnCancelarBanco?>')">Modificar Información Bancaria</button>
                                <!-- Botón para GUARDAR cambios en BANCO-->
                                <input nowrap class="btn btn-primary" type="submit" style="display: none;" id="<?php echo $btnGuardarBanco?>" name="<?php echo $btnGuardarBanco?>" onclick="inputcoming('btnModificarBanco','btnGuardarBanco')" value="Guardar tus datos del banco, malandrín de primera">
                                <!-- Botón para CANCELAR cambios en BANCO-->
                                <button nowrap class="btn btn-primary" type="button" style="display: none;" id="<?php echo $btnCancelarBanco?>" name="<?php echo $$btnCancelarBanco?>"
                                onclick="inputcoming('infoIBAN','inputIBAN',),
                                inputcoming('infoNumtarjeta','inputNumtarjeta',),
                                inputcoming('infoFechatarjeta','inputFechatarjeta',),
                                inputcoming('infoCVC','inputCVC',),
                                inputcoming('<?php echo $btnGuardarBanco?>','<?php echo $btnModificarBanco?>',),
                                inputcoming('<?php echo $btnCancelarBanco?>','<?php echo $btnModificarBanco?>',)">Cancelar modificación</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <script src="/js/userinstructions.js"></script>