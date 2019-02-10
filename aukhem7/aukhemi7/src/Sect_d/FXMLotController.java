/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Sect_d;

import static Sect_d.FXMLnfoController.s;
import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXDialog;
import com.jfoenix.controls.JFXListView;
import com.jfoenix.controls.JFXSnackbar;
import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.event.Event;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Label;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import met.orderT;
import org.controlsfx.control.PopOver;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLotController implements Initializable {

    @FXML
    private AnchorPane rootpane;
    @FXML
    private JFXButton retourbtn;
    @FXML
    private JFXListView<JFXButton> table;
    JFXButton btn;
AnchorPane pane;
JFXSnackbar sn;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        try {
            // TODO
            table.setExpanded(Boolean.TRUE);
            table.depthProperty().set(1);
            
            
            orderT o = new orderT();
            ArrayList<orderT> aro = o.getorders("SECT.D");
            for (orderT object : aro) {
                btn = new JFXButton(object.toString());
                table.getItems().add(btn);
                btn.setOnMouseClicked(new EventHandler<MouseEvent>() {
                    @Override
                    public void handle(MouseEvent event) {
                        if (event.getClickCount() == 2) {
                            try {
                                o.sendto("BO", aro,"SECT.D");
                            } catch (SQLException ex) {
                                 sn = new JFXSnackbar(rootpane);
                    EventHandler handler =new EventHandler() {
                        @Override
                        public void handle(Event event) {
                            sn.show(ex.getMessage(), 10000);
                        }
                    };
                    
                    sn.show("erreur ","afficher erreur", 3000,handler);
                            }
                            sn = new JFXSnackbar(rootpane);
                            EventHandler handler =new EventHandler() {
                                @Override
                                public void handle(Event event) {
                                    sn.unregisterSnackbarContainer(rootpane);
                                }
                            };
                            sn.show("envoyé vers bureau d'rodre ","D'accord", 3000,handler);
                        }
                    }});
            }} catch (SQLException ex) {
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
    private void retour(ActionEvent event) throws IOException {
        pane =  FXMLLoader.load(getClass().getResource("/Sect_d/FXMLSectD.fxml"));
            rootpane.getChildren().setAll(pane);
    }
    
}
