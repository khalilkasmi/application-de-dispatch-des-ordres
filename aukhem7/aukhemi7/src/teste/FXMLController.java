/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teste;

import com.jfoenix.controls.JFXButton;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import org.controlsfx.control.PopOver;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLController implements Initializable {

    /**
     * Initializes the controller class.
     */
        @FXML
    private JFXButton btn;

    @FXML
    void clicked(ActionEvent event) throws IOException {
        PopOver pop = new PopOver();
        pop.setAnimated(true);
        pop.setTitle("this is a pop up title");
        pop.setArrowLocation(PopOver.ArrowLocation.LEFT_TOP);
        FXMLLoader loader = new FXMLLoader(getClass().getResource("FXMLadd.fxml"));
        pop.setContentNode((Parent)loader.load());
        pop.show(btn);
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    
}
