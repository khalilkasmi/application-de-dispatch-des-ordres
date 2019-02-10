/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package responsable_BO;

import aukhemi7.*;
import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXPasswordField;
import com.jfoenix.controls.JFXTextField;
import connexion.connexion;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.embed.swing.SwingFXUtils;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.AnchorPane;
import javax.imageio.ImageIO;
import met.employe;

/**
 *
 * @author kasmi
 */
public class FXMLFXMLresponsable_BOController implements Initializable {
   
    @FXML
    private ImageView img;
    
    @FXML
    private AnchorPane rootpane;

    @FXML
    private JFXButton deconnexionbtn;

    @FXML
    private JFXButton brbtn;

    @FXML
    private Label lbl;

    @FXML
    private JFXButton sobtn;

    @FXML
    private JFXButton nobtn;

    AnchorPane pane;
    
    @FXML
    void deconnexion(ActionEvent event) throws IOException {
            
            pane =  FXMLLoader.load(getClass().getResource("/aukhemi7/FXMLLogin.fxml"));
            rootpane.getChildren().setAll(pane);
            
    }

    @FXML
    void no(ActionEvent event) throws IOException {
            pane =  FXMLLoader.load(getClass().getResource("/responsable_BO/FXMLno.fxml"));
            rootpane.getChildren().setAll(pane);
    }

   

    @FXML
    void so(ActionEvent event) throws IOException {
            pane =  FXMLLoader.load(getClass().getResource("/responsable_BO/FXMLspo.fxml"));
            rootpane.getChildren().setAll(pane);
    }

    

    @FXML
    void br(ActionEvent event) throws IOException {
            pane =  FXMLLoader.load(getClass().getResource("/responsable_BO/FXMLbr.fxml"));
            rootpane.getChildren().setAll(pane);
    }

    

    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        employe em =  (employe) aukhemi7.FXMLLoginController.getemp();
            lbl.setText(em.getFullname());
       
    }    
    
}

