const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const nodemailer = require('nodemailer')

app.listen(3000, ()=>{
    console.log("Escuchando el puerto 3000")
});
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use('/assets', express.static(__dirname + '/assets'))
app.get("/", (req, res) => {
    res.sendFile(__dirname + '/index.html')
})

const enviado = () => {
    alert('enviado')

}
const enviar = async (mail) => {
    const to = "caribai93@gmail.com"
    const subject = "Orden de Certificado"
    let transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
        user: 'correodeprueba639@gmail.com',
        pass: 'prueba123',
        },
    })
    let mailOptions = {
        from: 'correodeprueba639@gmail.com',
        to,
        subject,
        text: mail,
    }
    transporter.sendMail(mailOptions, (err, data) => {
        if (err) console.log(err)
        if (data) console.log(data)
  return true;
})
}

app.post("/mail", async(req,res)=>{
    const {nombre,telefono,email,municipio,direccion,tipo,superficie,mensaje} = req.body
    const mail = `
Nombre: ${nombre}, 
Telefono: ${telefono}, 
Email: ${email}, 
Municipio: ${municipio}, 
Direccion: ${direccion}, 
Tipo: ${tipo}, 
Superficie: ${superficie}, 
Mensaje: ${mensaje}`
    console.log(mail)
    enviar(mail).then(()=>{
        res.sendFile(__dirname + "/mail.html")
    })
})

