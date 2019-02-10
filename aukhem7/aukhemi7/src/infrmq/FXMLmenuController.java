/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package infrmq;

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
public class FXMLmenuController implements Initializable {

    @FXML
    private AnchorPane rootpane;
    @FXML
    private JFXButton savebtn;
    @FXML
    private JFXTextArea decrtxt;
    @FXML
    private DatePicker datep;
    @FXML
    private JFXTextField nostxt;

    /**
     * Initializes the controller class.
     */
    AnchorPane pane;
    JFXSnackbar sn;
    connexion c ;
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
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
         infrmq.FXMLboiterecController.ordera o = new infrmq.FXMLboiterecController.ordera();
         ArrayList<infrmq.FXMLboiterecController.ordera> ar = new ArrayList<infrmq.FXMLboiterecController.ordera>();
         ar = o.getdata("S.INFRMTQ");
         if (o.sendto("SECT.D", ar,"S.INFRMTQ")) {
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
