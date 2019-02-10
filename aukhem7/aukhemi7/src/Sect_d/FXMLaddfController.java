/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Sect_d;


import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXCheckBox;
import com.jfoenix.controls.JFXDatePicker;
import com.jfoenix.controls.JFXDialog;
import com.jfoenix.controls.JFXSnackbar;
import com.jfoenix.controls.JFXTextArea;
import com.jfoenix.controls.JFXTextField;
import com.jfoenix.validation.RequiredFieldValidator;
import connexion.connexion;
import java.net.URL;
import java.sql.ResultSet;
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
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.Region;
import javafx.scene.layout.StackPane;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLaddfController implements Initializable {

    @FXML
    private JFXTextField numordre;
    @FXML
    private DatePicker datep;
    @FXML
    private JFXCheckBox chdgur;
    @FXML
    private JFXCheckBox chdet;
    @FXML
    private JFXCheckBox chdaf;
    @FXML
    private JFXCheckBox chsinfrmatq;
    @FXML
    private JFXTextArea descrtxt;
    @FXML
    private JFXTextArea insctxt;
    @FXML
    private JFXButton savebtn;
    connexion c ;
    @FXML
    private AnchorPane rootpane;
    JFXSnackbar sn;
    @FXML
    private StackPane stackp;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        RequiredFieldValidator  validator = new RequiredFieldValidator();
            numordre.getValidators().add(validator);
            descrtxt.getValidators().add(validator);
            insctxt.getValidators().add(validator);
            validator.setMessage("veuillez remplir ce champ");
            numordre.focusedProperty().addListener(new ChangeListener<Boolean>() {
          @Override
          public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
              if(!newValue) numordre.validate();
          }
      });
            descrtxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
          @Override
          public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
              if(!newValue) descrtxt.validate();
          }
      });
            insctxt.focusedProperty().addListener(new ChangeListener<Boolean>() {
          @Override
          public void changed(ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) {
              if(!newValue) insctxt.validate();
          }
      });
            if (datep.getValue() == null ) {
                sn = new JFXSnackbar(rootpane);
                    EventHandler handler =new EventHandler() {
                        @Override
                        public void handle(Event event) {
                            sn.unregisterSnackbarContainer(rootpane);
                        }
                    };
                    
                    sn.show("selectionner une datea ","D'accord", 3000,handler);
            }
            
        
    }    
    
    public FXMLaddfController() {
    }

    @FXML
    private void save(ActionEvent event)  {
        try {
            c = connexion.getDbCon();
            String daf = null ;
            String dgur = null ;
            String det = null ;
            String sinfrmatq = null ;
            String ref = null ;
            String ob =null;
            String sr =null ;
            String dt = datep.getValue().toString();
            
            
            
            
            
            ResultSet rs = c.query(" SELECT * FROM `order` WHERE `reference` like '"+FXMLnfoController.s+"%'");
            while(rs.next()){
                ref = rs.getString("reference");
                ob = rs.getString("objet");
                sr = rs.getString("source");
                 
            }
           
            
            
            if (chdaf.isSelected() ) {
                daf = chdaf.getText();
            }
            if (chdgur.isSelected() ) {
                dgur = chdgur.getText();
            }
            if (chdet.isSelected() ) {
                det = chdet.getText();
            }
            if (chsinfrmatq.isSelected() ) {
                sinfrmatq = chsinfrmatq.getText();
            }
            if (daf != null || dgur != null || det != null || sinfrmatq!=null  ) {
                String st = daf+","+dgur+","+det+","+sinfrmatq ;
                int m =c.insert("INSERT INTO `ficheordrea`( `n_order_a`,`date`, `reference`, `organisme`, `objet`, `destination`, `description`, `instruction`) "
                        + "VALUES "
                        + "('"+numordre.getText()+"','"+dt+"','"+ref+"','"+sr+"','"+ob+"','"+st+"','"+descrtxt.getText()+"','"+insctxt.getText()+"')");
                if (m == 0 ) {
                    sn = new JFXSnackbar(rootpane);
                    EventHandler handler =new EventHandler() {
                        @Override
                        public void handle(Event event) {
                            sn.unregisterSnackbarContainer(rootpane);
                        }
                    };
                    
                    sn.show("fiche n'est pas ajouté ","D'accord", 3000,handler);
                }else{
                    sn = new JFXSnackbar(rootpane);
                    EventHandler handler =new EventHandler() {
                        @Override
                        public void handle(Event event) {
                            sn.unregisterSnackbarContainer(rootpane);
                        }
                    };
                    
                    sn.show("fiche  ajouté ","D'accord", 3000,handler);
                }
            }else{
                if (daf == null && dgur == null && det == null && sinfrmatq==null) {
                    sn = new JFXSnackbar(rootpane);
                    EventHandler handler =new EventHandler() {
                        @Override
                        public void handle(Event event) {
                            sn.unregisterSnackbarContainer(rootpane);
                        }
                    };
                    
                    sn.show("selectionner une departement ","D'accord", 3000,handler);
                }
            }
            
        } catch (SQLException ex) {
           sn = new JFXSnackbar(rootpane);
                    EventHandler handler =new EventHandler() {
                        @Override
                        public void handle(Event event) {
                            //sn.unregisterSnackbarContainer(rootpane);
                            JFXDialog db = new JFXDialog(stackp,new Label(ex.getMessage()), JFXDialog.DialogTransition.TOP);
                            db.show();
                        }
                    };
                    
                    sn.show("fiche n'est pas ajouté ","afficher l'erreur ?", 3000,handler);
        }
        
        
    }
    
 
  
}
