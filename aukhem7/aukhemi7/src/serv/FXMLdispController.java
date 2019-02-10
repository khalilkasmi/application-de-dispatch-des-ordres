/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serv;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXSnackbar;
import com.jfoenix.controls.JFXTextArea;
import com.jfoenix.controls.JFXTextField;
import com.jfoenix.validation.RequiredFieldValidator;
import connexion.connexion;
import java.net.URL;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.ResourceBundle;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.event.ActionEvent;
import javafx.event.Event;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.DatePicker;
import javafx.scene.layout.AnchorPane;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLdispController implements Initializable {

    @FXML
    private AnchorPane rootpane;
    @FXML
    private JFXTextField nostxt;
    @FXML
    private DatePicker datep;
    @FXML
    private JFXTextArea decrtxt;
    @FXML
    private JFXButton savebtn;
AnchorPane pane;
    JFXSnackbar sn;
    connexion c ;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        RequiredFieldValidator  validator = new RequiredFieldValidator();
        nostxt.getValidators().add(validator);
        decrtxt.getValidators().add(validator);
        validator.setMessage("veuillez remplir ce champ");
        nostxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
          @Override
          public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
              if(!newValue) nostxt.validate();
          }
      });
        decrtxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
          @Override
          public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
              if(!newValue) decrtxt.validate();
          }
      });
    }    

    @FXML
    private void save(ActionEvent event) throws SQLException {
        c =connexion.getDbCon();
        serv.FXMLbrController.ordera o = new serv.FXMLbrController.ordera();
        ArrayList<serv.FXMLbrController.ordera> ar = new ArrayList<serv.FXMLbrController.ordera>();
        String to = o.getdep().get(0);
        ar = o.getdata(FXMLservController.getemp().getUsername());
          if (o.sendto(to, ar,FXMLservController.getemp().getUsername())) {
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
