/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package infrmq;

import com.jfoenix.controls.JFXButton;
import java.io.IOException;
import java.net.URL;
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
public class FXMLhomeController implements Initializable {

    @FXML
    private AnchorPane rootpane;
    @FXML
    private JFXButton deconnexionbtn;
    @FXML
    private Label label;
    @FXML
    private JFXButton brbtn;
static employe em;
AnchorPane pane;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        this.em =  (employe) aukhemi7.FXMLLoginController.getemp();
            label.setText(em.getFullname());
    }    

    @FXML
    private void deconnexion(ActionEvent event) throws IOException {
       pane =  FXMLLoader.load(getClass().getResource("/aukhemi7/FXMLLogin.fxml"));
            rootpane.getChildren().setAll(pane);
    }

    @FXML
    private void br(ActionEvent event) throws IOException {
        pane =  FXMLLoader.load(getClass().getResource("/infrmq/FXMLboiterec.fxml"));
            rootpane.getChildren().setAll(pane);
    }
    static employe getemp(){
        return em;
    }
    
}
