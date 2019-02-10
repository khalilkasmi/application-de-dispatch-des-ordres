/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package responsable_BO;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXDialog;
import com.jfoenix.controls.JFXDialogLayout;
import com.jfoenix.controls.JFXSnackbar;
import com.jfoenix.controls.JFXTextField;
import com.jfoenix.validation.RequiredFieldValidator;
import java.awt.event.KeyEvent;
import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.event.ActionEvent;
import javafx.event.Event;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.StackPane;
import javafx.scene.text.Text;
import met.order;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLnoController implements Initializable {

    /**
     * Initializes the controller class.
     */
    
      @FXML
    private AnchorPane rootpane;
      
      @FXML
    private JFXButton retourbtn;

    @FXML
    private JFXTextField objtxt;

    @FXML
    private JFXTextField reftxt;

    @FXML
    private JFXButton enregbtn;

    @FXML
    private JFXTextField srctxt;

    @FXML
    private JFXButton reinbtn;
    
    AnchorPane pane;

     @FXML
    private JFXSnackbar sn;

    met.order ordre;
    
    @FXML
    void retour(ActionEvent event) throws IOException {
            pane =  FXMLLoader.load(getClass().getResource("/responsable_BO/FXMLresponsable_BO.fxml"));
            rootpane.getChildren().setAll(pane);
    }

    @FXML
    void enregistrer(ActionEvent event) throws SQLException {
            ordre = new order(objtxt.getText(),reftxt.getText() ,srctxt.getText());
           sn = new JFXSnackbar(rootpane);
            EventHandler handler =new EventHandler() {
                @Override
                public void handle(Event event) {
                    sn.unregisterSnackbarContainer(rootpane);
                }
            };
            try {
             if (ordre.enregistrerordre()) {
             
             sn.show("ordre a ete bien ajouté","D'accord", 3000,handler);
        }else{
              sn.show("votre ordre n'est pas ajouté","D'accord", 3000,handler);
            }
        } catch (SQLException e) {
            sn.show("votre ordre n'est pas ajouté","D'accord", 3000,handler);
        }
    }
   

    @FXML
    void reinitialiser(ActionEvent event) {
        reftxt.setText("");
        objtxt.setText("");
        srctxt.setText("");
    }
    
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
         sn = new JFXSnackbar(rootpane);
        
        
        RequiredFieldValidator validator = new RequiredFieldValidator();
        objtxt.getValidators().add(validator);
        reftxt.getValidators().add(validator);
        srctxt.getValidators().add(validator);
        validator.setMessage("veuillez remplir ce champ");
        
        objtxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
            @Override
            public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
                if(!newValue) objtxt.validate();
            }
        });
        
        reftxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
            @Override
            public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
                if(!newValue) {
                      reftxt.validate();
                }

            }
        });
        
        srctxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
            @Override
            public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
                if(!newValue) srctxt.validate();
            }
        });

    }    
    
}
