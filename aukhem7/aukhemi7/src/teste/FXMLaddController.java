/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teste;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXCheckBox;
import com.jfoenix.controls.JFXDatePicker;
import com.jfoenix.controls.JFXTextField;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLaddController implements Initializable {

    /**
     * Initializes the controller class.
     */
      @FXML
    private JFXTextField inputone;

    @FXML
    private JFXCheckBox chtwo;

    @FXML
    private JFXButton btnadd;

    @FXML
    private JFXCheckBox chone;

    @FXML
    private JFXTextField inputtwo;
 @FXML
    void cli(ActionEvent event) {
        lbl.setText("btn clicked");
        JFXDatePicker d = new JFXDatePicker();
        d.show();
    }
      @FXML
    private Label lbl;
      
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    
}
