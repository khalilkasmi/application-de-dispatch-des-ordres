/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Sect_d;

import com.jfoenix.controls.JFXButton;
import connexion.connexion;
import java.io.IOException;
import java.net.URL;
import java.sql.ResultSet;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.layout.AnchorPane;
import met.employe;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLSectDController implements Initializable {

    /**
     * Initializes the controller class.
     */
    @FXML
    private AnchorPane rootpane;
    
    @FXML
    private JFXButton deconnexionbtn;

    @FXML
    private JFXButton nfobtn;

    @FXML
    private JFXButton otbtn;

    @FXML
    private Label lbl;
    
    AnchorPane pane;

    @FXML
    void deconnexion(ActionEvent event) throws IOException {
             pane =  FXMLLoader.load(getClass().getResource("/aukhemi7/FXMLLogin.fxml"));
            rootpane.getChildren().setAll(pane);
    }

    @FXML
    void nfo(ActionEvent event) throws IOException {
            pane =  FXMLLoader.load(getClass().getResource("/Sect_d/FXMLnfo.fxml"));
            rootpane.getChildren().setAll(pane);
    }


    @FXML
    void ot(ActionEvent event) throws IOException {
            pane =  FXMLLoader.load(getClass().getResource("/Sect_d/FXMLot.fxml"));
            rootpane.getChildren().setAll(pane);
    }

     
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
            employe em =  (employe) aukhemi7.FXMLLoginController.getemp();
            lbl.setText(em.getFullname());
            
            
    }    
    
}
