/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package responsable_BO;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXComboBox;
import com.jfoenix.controls.JFXDialog;
import com.jfoenix.controls.JFXDialogLayout;
import com.jfoenix.controls.JFXSnackbar;
import connexion.connexion;
import java.io.IOException;
import java.net.URL;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
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
public class FXMLspoController implements Initializable {

    /**
     * Initializes the controller class.
     */
    
     @FXML
    private JFXButton retourbtn;

    @FXML
    private JFXComboBox<String> combo;

    @FXML
    private JFXButton supbtn;

    @FXML
    private StackPane stp;

     @FXML
    private AnchorPane rootpane;

    private AnchorPane pane;
     
     order o ;
       connexion c;
    
       JFXSnackbar sn ;
       
    @FXML
    void retour(ActionEvent event) throws IOException {
            pane =  FXMLLoader.load(getClass().getResource("/responsable_BO/FXMLresponsable_BO.fxml"));
            rootpane.getChildren().setAll(pane);
    }

    

    @FXML
    void supprimer(ActionEvent event) throws SQLException {
        sn = new JFXSnackbar(rootpane);
        EventHandler handler =new EventHandler() {
                @Override
                public void handle(Event event) {
                    sn.unregisterSnackbarContainer(rootpane);
                }
            };
        
        int m =  c.insert("DELETE FROM `order` WHERE `reference`= '"+ combo.getSelectionModel().getSelectedItem() +"'");
       
       if (m == 1 ) {
           
           
            sn.show("ordre a ete bien supprimé","D'accord", 3000,handler);
        }else{
           
           
            sn.show("ordre n'est poas supprimé","D'accord", 3000,handler);
        }
    }

    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
         try {
             
           c = connexion.getDbCon() ;
            ResultSet rs = c.query("SELECT `reference` FROM `order`");
            List<String> results = new ArrayList<String>();
            while(rs.next()){
                results.add(rs.getString(1));
            }
             combo.getItems().addAll(results);
             
         } catch (SQLException ex) {
             Logger.getLogger(FXMLspoController.class.getName()).log(Level.SEVERE, null, ex);
         }
    }    
   
}
