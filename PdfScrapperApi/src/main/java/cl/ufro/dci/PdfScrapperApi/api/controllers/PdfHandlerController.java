package cl.ufro.dci.PdfScrapperApi.api.controllers;


import java.io.File;
import java.sql.SQLOutput;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import cl.ufro.dci.PdfScrapperApi.api.services.PdfHandlerService;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.servlet.http.HttpServletRequest;

@RestController
@RequestMapping("/api/pdf")
public class PdfHandlerController {

    @RequestMapping(path = "/upload", method = RequestMethod.POST, consumes = { MediaType.MULTIPART_FORM_DATA_VALUE })
    public ResponseEntity<String> uploadPdf(@RequestPart MultipartFile pdf){
        System.out.println(pdf + ": was the file received");

        return new ResponseEntity<>("<h1>Recieved</h1>", HttpStatus.OK);
    }

    @GetMapping(path = "helloworld", produces = MediaType.ALL_VALUE)
    public ResponseEntity<String> helloWorld(){
        return new ResponseEntity<>("<h1>Hello world</h1>", HttpStatus.OK);
    }



}
