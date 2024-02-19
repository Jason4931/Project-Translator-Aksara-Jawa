import { toJavanese } from "carakanjs";
import { toLatin } from "carakanjs";
import express from "express";

function replace_re_le(text) {
    text=text.replace(/re/g, "rx");
    text=text.replace(/le/g, "lx");
    return text;
}
function replace_angka(text) {
    text=text.replace(/0/g, "");
    text=text.replace(/1/g, "");
    text=text.replace(/2/g, "");
    text=text.replace(/3/g, "");
    text=text.replace(/4/g, "");
    text=text.replace(/5/g, "");
    text=text.replace(/6/g, "");
    text=text.replace(/7/g, "");
    text=text.replace(/8/g, "");
    text=text.replace(/9/g, "");
    return text;
}
function replace_rekan(text) {
    text=text.replace(/z/g, "");
    text=text.replace(/f/g, "");
    text=text.replace(/v/g, "");
    text=text.replace(/kh/g, "k h");
    text=text.replace(/gh/g, "g h");
    return text;
}
function replace_swara(text) {
    text=text.replace(/a /g, "A");
    text=text.replace(/i /g, "I");
    text=text.replace(/u /g, "U");
    text=text.replace(/e /g, "E");
    text=text.replace(/o /g, "O");
    return text;
}
function replace_e(text) {
    text=text.replace(/é/g, "e");
    text=text.replace(/ê/g, "x");
    text=text.replace(/ě/g, "x");
    text=text.replace(/è/g, "e");
    return text;
}

let app = express();
app.get('/:latin/:aksara/:murda/:rekan/:swara/:wilangan/:khusus',(req, res)=>{
    if(req.params.aksara=='false'){
        if(req.params.khusus=='true'){
            req.params.latin=replace_re_le(req.params.latin);
            console.log(req.params.latin);
        }
        if(req.params.wilangan=='false'){
            req.params.latin=replace_angka(req.params.latin);
            console.log(req.params.latin);
        }
        if(req.params.rekan=='false'){
            req.params.latin=replace_rekan(req.params.latin);
            console.log(req.params.latin);
        }
        let swara=false;
        if(req.params.swara=='true'){
            req.params.latin=replace_swara(req.params.latin);
            swara=true;
        }
        let murda=false;
        if(req.params.murda=='true'){
            murda=true;
        }
        req.params.latin=replace_e(req.params.latin);
        req.params.latin=req.params.latin.replace(/"/g, "");
        req.params.latin=req.params.latin.replace(/'/g, "");
        let x = toJavanese(req.params.latin, {useAccents: false, useSwara: swara, useMurda: murda})
        console.log(x)
        res.json({
            hasil:x
        });
    }
    if(req.params.aksara=='true'){
        let x = toLatin(req.params.latin);
        console.log(x)
        res.json({
            hasil:x
        });
    }
});
app.listen(8080);

// let x = toJavanese("Test", {useAccents: false, useSwara: false, useMurda: false});
// console.log(x)