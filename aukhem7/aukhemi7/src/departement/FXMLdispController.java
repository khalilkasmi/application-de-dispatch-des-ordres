/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package departement;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXCheckBox;
import com.jfoenix.controls.JFXSnackbar;
import com.jfoenix.controls.JFXTextArea;
import com.jfoenix.validation.RequiredFieldValidator;
import connexion.connexion;
import departement.FXMLbrController.ordera;
import java.net.PasswordAuthentication;
import java.net.URL;
import java.security.Security;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Date;
import java.util.Iterator;
import java.util.Properties;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.event.ActionEvent;
import javafx.event.Event;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.VBox;


/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLdispController implements Initializable {

    @FXML
    private VBox vbox;
    @FXML
    private JFXTextArea descrtxt;
    @FXML
    private JFXTextArea instrtxt;
    @FXML
    private JFXButton savebtn;
    
    AnchorPane pane;
    JFXSnackbar sn;
    connexion c ;
    @FXML
    private AnchorPane rootpane;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        RequiredFieldValidator  validator = new RequiredFieldValidator();
        descrtxt.getValidators().add(validator);
        instrtxt.getValidators().add(validator);
        validator.setMessage("veuillez remplir ce champ");
        descrtxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
          @Override
          public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
              if(!newValue) descrtxt.validate();
          }
      });
        instrtxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
          @Override
          public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
              if(!newValue) instrtxt.validate();
          }
      });
        // adding checkbox into vbox
        FXMLbrController.ordera oa = new FXMLbrController.ordera();
        ArrayList<String> services;
        try {
            services = oa.getservices();
            for (String service : services) {
            vbox.getChildren().add(new JFXCheckBox(service));
        }
        } catch (SQLException ex) {
            sn = new JFXSnackbar(rootpane);
                    EventHandler handler =new EventHandler() {
                        @Override
                        public void handle(Event event) {
                            sn.show(ex.getMessage(), 10000);
                        }
                    };
                    
                    sn.show("erruer ","afficher erreur", 3000,handler);
        }
        }

    @FXML
    private void save(ActionEvent event) throws SQLException  {
        c =connexion.getDbCon();
        ordera o = new FXMLbrController.ordera();
        ArrayList<ordera> ar = new ArrayList<ordera>();
        String to = "";
        for (Iterator<Node> it = vbox.getChildren().iterator(); it.hasNext();) {
            JFXCheckBox ch = (JFXCheckBox) it.next();
            if (ch.isSelected()) {
                to = to+","+ch.getText();
            }
        }
        ar = o.getdata(FXMLdepartementController.getemp().getUsername());
        if (o.sendto(to, ar)) {
            sn = new JFXSnackbar(rootpane);
                    EventHandler handler =new EventHandler() {
                        @Override
                        public void handle(Event event) {
                            sn.unregisterSnackbarContainer(rootpane);
                        }
                    };
                    
                    sn.show("bien envoyé ","d'accord", 3000,handler);
        } else{
           sn = new JFXSnackbar(rootpane);
                    EventHandler handler =new EventHandler() {
                        @Override
                        public void handle(Event event) {
                            sn.unregisterSnackbarContainer(rootpane);
                        }
                    };
                    
                    sn.show("n'est pas jouté","D'accord", 3000,handler);
        }

    }
    }
    
    
      
     
  
        

