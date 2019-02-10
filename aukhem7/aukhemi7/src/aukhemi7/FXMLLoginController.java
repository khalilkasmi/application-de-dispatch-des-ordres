/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aukhemi7;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXDialog;
import com.jfoenix.controls.JFXDialogLayout;
import com.jfoenix.controls.JFXPasswordField;
import com.jfoenix.controls.JFXSnackbar;
import com.jfoenix.controls.JFXTextField;
import com.jfoenix.validation.RequiredFieldValidator;
import connexion.connexion;
import java.io.IOException;
import java.net.URL;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.event.ActionEvent;
import javafx.event.Event;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.Background;
import javafx.scene.layout.Pane;
import javafx.scene.layout.StackPane;
import javafx.scene.text.Text;
import met.employe;

/**
 *
 * @author kasmi
 */
public class FXMLLoginController implements Initializable {
   private static  connexion c ;
      @FXML
    private JFXButton loginbtn;

    @FXML
    private  JFXPasswordField  ptxt;

    @FXML
    private   JFXTextField utxt;

     @FXML
    private Label lbl;
    
      @FXML
    private AnchorPane rootpane;
      
     AnchorPane pane;
     
      @FXML
    private JFXSnackbar sn;
      
   @FXML
    private StackPane stp;
     private static  employe emp = null;
     
     @FXML
    void login(ActionEvent event) throws SQLException, IOException {
        
        
        if (c.login(utxt.getText(), ptxt.getText())) {
            
            
            
            ResultSet rs = c.query("SELECT * FROM `employe` WHERE `login`= '"+utxt.getText()+"'");
            while(rs.next()){
            String role = rs.getString("role");
            String fullname = rs.getString("fullname");
            String login = rs.getString("login");
            
             emp = new employe(utxt.getText(),ptxt.getText(),role,fullname );
            
                if (role.equalsIgnoreCase("responsable_BO")) {
                    pane =  FXMLLoader.load(getClass().getResource("/responsable_BO/FXMLresponsable_BO.fxml"));
                }else if(role.equalsIgnoreCase("directrice")){
                    pane =  FXMLLoader.load(getClass().getResource("/Sect_d/FXMLSectD.fxml"));
                }else if(role.equalsIgnoreCase("responsable_concerne")){
                    pane =  FXMLLoader.load(getClass().getResource("/serv/FXMLserv.fxml"));
                }else if(role.equalsIgnoreCase("chef_department")){
                    if (login.equalsIgnoreCase("s_infrmtq")) {
                        pane =  FXMLLoader.load(getClass().getResource("/infrmq/FXMLhome.fxml"));
                    }else{
                        pane =  FXMLLoader.load(getClass().getResource("/departement/FXMLdepartement.fxml"));
                    }
                }
             
             /*
             
            switch (role) {
                case "responsable_BO" : pane =  FXMLLoader.load(getClass().getResource("/responsable_BO/FXMLresponsable_BO.fxml")); break;
                case "chef_department" :  if (login.equals("s_infrmtq")) {
                        pane =  FXMLLoader.load(getClass().getResource("/departementinf/FXMLdepartementinf.fxml")); break;}else{pane =  FXMLLoader.load(getClass().getResource("/departement/FXMLdepartement.fxml")); break;}
                case "directrice" :  pane =  FXMLLoader.load(getClass().getResource("/Sect_d/FXMLSectD.fxml")); break;
                case "responsable_concerne" :  pane =  FXMLLoader.load(getClass().getResource("/serv/FXMLserv.fxml")); break;
            }*/
            rootpane.getChildren().setAll(pane);
            
        }
            
            
        }else{
           // lbl.setText("wrong username or password");
            //lbl.setStyle("-fx-background-color :red");
            
            sn = new JFXSnackbar(rootpane);
            EventHandler handler =new EventHandler() {
                @Override
                public void handle(Event event) {
                    sn.unregisterSnackbarContainer(rootpane);
                }
            };
           
            sn.show("nom d'utilisateur ou motdepass incorrect","D'accord", 3000,handler);
            
            
            
            
           /*
            JFXDialogLayout content = new JFXDialogLayout();
             JFXDialog dg = new JFXDialog(stp,content, JFXDialog.DialogTransition.TOP);
            content.setHeading(new Text("erreur de connexion"));
            content.setBody(new Text("veuillez verifier le nom d'utilisateur et le mot de pass avant de continuer"));
            content.setStyle("-fx-background-color :#fff");
           
            JFXButton btn = new JFXButton("ok");
            btn.setOnAction((ActionEvent event1) -> {
                dg.close();
            });
            content.setActions(btn);
            
            dg.show();*/
        }
    
    }

    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
      c = connexion.getDbCon();
      
        RequiredFieldValidator  validator = new RequiredFieldValidator();
        utxt.getValidators().add(validator);
        ptxt.getValidators().add(validator);
        validator.setMessage("veuillez remplir ce champ");
        
        utxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
          @Override
          public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
              if(!newValue) utxt.validate();
          }
      });
        
        ptxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
          @Override
          public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
              if(!newValue) ptxt.validate();
          }
      });
        
      
    }    
    
    public static Object getemp(){
        return emp;
    }
    
}
