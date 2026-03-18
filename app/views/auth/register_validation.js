function validarFormulario(event) {
    const nombre = document.getElementById("nombre").value.trim();
    const apellidos = document.getElementById("apellidos").value.trim();
    const dni = document.getElementById("dni").value.trim();
    const correo = document.getElementById("correo_electronico").value.trim();
    const contraseña = document.getElementById("contraseña").value.trim();
    const confirmarContraseña = document.getElementById("confirmar_contraseña").value.trim();
    const formulario = document.getElementById("register_form"); 


    const nombreApellidosRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    if (!nombreApellidosRegex.test(nombre)) 
    {
        alert("El nombre solo puede contener letras y espacios.");
        event.preventDefault();
        return false;
    }
    if (!nombreApellidosRegex.test(apellidos)) 
    {
        alert("Los apellidos solo pueden contener letras y espacios.");
        event.preventDefault();
        return false;
    }

    const dniRegex = /^\d{8}[A-Za-z]$/;
    if (!dniRegex.test(dni)) 
    {
        alert("El DNI debe tener 8 dígitos seguidos de una letra.");
        event.preventDefault();
        return false;
    }

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(correo))
    {
        alert("Por favor, introduce un correo electrónico válido.");
        event.preventDefault();
        return false;
    }

    const contraseñaRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}|:"<>?])[\w\d!@#$%^&*()_+{}|:"<>?]{4,12}$/;
    if (!contraseñaRegex.test(contraseña)) 
    {
        alert("La contraseña debe tener entre 4 y 12 caracteres, al menos un número, una letra y un carácter especial.");
        event.preventDefault();
        return false;
    }

    if (contraseña !== confirmarContraseña)
    {
        alert("Las contraseñas no coinciden.");
        event.preventDefault();
        return false;
    }
    return (true);
}
