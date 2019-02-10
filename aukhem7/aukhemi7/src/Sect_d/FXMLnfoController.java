/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Sect_d;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXHamburger;
import com.jfoenix.controls.JFXListView;
import com.jfoenix.controls.JFXPopup;
import com.jfoenix.controls.JFXPopup.PopupHPosition;
import com.jfoenix.controls.JFXPopup.PopupVPosition;
import com.jfoenix.controls.JFXRippler;
import com.jfoenix.controls.JFXRippler.RipplerMask;
import com.jfoenix.controls.JFXRippler.RipplerPos;
import com.jfoenix.controls.JFXTreeTableView;
import com.sun.javafx.property.adapter.PropertyDescriptor;
import com.sun.org.apache.xalan.internal.xsltc.compiler.Constants;
import connexion.connexion;
import java.io.IOException;
import java.net.URL;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import static java.util.Collections.list;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.ListChangeListener;
import javafx.event.ActionEvent;
import javafx.event.Event;
import javafx.event.EventHandler;
import javafx.event.EventType;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.ContextMenu;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TextField;
import javafx.scene.input.ContextMenuEvent;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javax.tools.DocumentationTool;
import javax.xml.bind.Marshaller;
import met.order;
import org.controlsfx.control.PopOver;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLnfoController implements Initializable {

    /**
     * Initializes the controller class.
     */
     @FXML
    private AnchorPane rootpane;

    @FXML
    private JFXButton retourbtn;

   @FXML
    private JFXListView<JFXButton> table;
    
    AnchorPane pane;
    ContextMenu contextMenu;
   JFXButton btn;
  
    @FXML
    void retour(ActionEvent event) throws IOException {
         pane =  FXMLLoader.load(getClass().getResource("/Sect_d/FXMLSectD.fxml"));
            rootpane.getChildren().setAll(pane);
    }
            
   
    
   static  String s = null ;
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        table.setExpanded(Boolean.TRUE);
        table.depthProperty().set(1);
        
         try {
             order o = new order();
             ArrayList<order> aro = o.getorders();
             for (order object : aro) {
                btn = new JFXButton(object.toString());
                table.getItems().add(btn);
                
                 
                btn.setOnMouseClicked(new EventHandler<MouseEvent>() {
                    @Override
                    public void handle(MouseEvent event) {
                         PopOver pop = new PopOver();
                    pop.setAnimated(true);
                    pop.setTitle("reference :"+object.getReference());    
                    s =object.getReference() ;
                    
                    pop.setDetached(true);
                    FXMLLoader loader = new FXMLLoader(getClass().getResource("FXMLaddf.fxml"));
                 try {
                     pop.setContentNode((Parent)loader.load());
                     
                      pop.show(btn,800,300);

                 } catch (IOException ex) {
                     Logger.getLogger(FXMLnfoController.class.getName()).log(Level.SEVERE, null, ex);
                 }
                    }
                });
                
             }
         } catch (SQLException ex) {
             Logger.getLogger(FXMLnfoController.class.getName()).log(Level.SEVERE, null, ex);
         }      
    }
    @FXML
    private void open(MouseEvent event) throws IOException {
         /*PopOver pop = new PopOver();
            pop.setAnimated(true);
            pop.setTitle("ajouter une fiche");
            pop.setX(event.getSceneX());
            pop.setY(event.getSceneY());
            pop.setArrowLocation(PopOver.ArrowLocation.LEFT_TOP);
            FXMLLoader loader = new FXMLLoader(getClass().getResource("FXMLaddf.fxml"));
            pop.setContentNode((Parent)loader.load());
            pop.show(table,event.getSceneX(),event.getSceneY());*/
    }
  
    
     

    }
