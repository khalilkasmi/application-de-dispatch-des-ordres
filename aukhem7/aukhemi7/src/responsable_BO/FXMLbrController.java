/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package responsable_BO;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXTextField;
import com.jfoenix.controls.JFXTreeTableColumn;
import com.jfoenix.controls.JFXTreeTableView;
import com.jfoenix.controls.RecursiveTreeItem;
import com.jfoenix.controls.datamodels.treetable.RecursiveTreeObject;
import connexion.connexion;
import java.io.IOException;
import java.net.URL;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Collection;
import java.util.List;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;
import javafx.beans.value.ObservableValue;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TreeItem;
import javafx.scene.control.TreeTableColumn;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.control.cell.TreeItemPropertyValueFactory;
import javafx.scene.layout.AnchorPane;
import javafx.util.Callback;
import met.employe;
import met.ficheordress;
import met.order;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLbrController implements Initializable {

    /**
     * Initializes the controller class.
     */
        @FXML
    private JFXTextField filtertxt;
        
      @FXML
    private AnchorPane rootpane;

    @FXML
    private JFXButton retourbtn;

    @FXML
    private JFXTreeTableView<fiche> table;

    AnchorPane pane;
    
    connexion c ;
    
    @FXML
    void retour(ActionEvent event) throws IOException {
            pane =  FXMLLoader.load(getClass().getResource("/responsable_BO/FXMLresponsable_BO.fxml"));
            rootpane.getChildren().setAll(pane);
    }
    
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
    
       
        
        
          try {
              JFXTreeTableColumn<fiche,String> numsort = new JFXTreeTableColumn<>("numero de sortie");
              numsort.setPrefWidth(150);
              numsort.setCellValueFactory(new Callback<TreeTableColumn.CellDataFeatures<fiche, String>, ObservableValue<String>>() {
                  @Override
                  public ObservableValue<String> call(TreeTableColumn.CellDataFeatures<fiche, String> param) {
                      return param.getValue().getValue().nums;
                  }
              });
              JFXTreeTableColumn<fiche,String> obj = new JFXTreeTableColumn<>("objet");
              obj.setPrefWidth(150);
              obj.setCellValueFactory(new Callback<TreeTableColumn.CellDataFeatures<fiche, String>, ObservableValue<String>>() {
                  @Override
                  public ObservableValue<String> call(TreeTableColumn.CellDataFeatures<fiche, String> param) {
                      return param.getValue().getValue().obj;
                  }
              });
              JFXTreeTableColumn<fiche,String> dest = new JFXTreeTableColumn<>("destination");
              dest.setPrefWidth(150);
              dest.setCellValueFactory(new Callback<TreeTableColumn.CellDataFeatures<fiche, String>, ObservableValue<String>>() {
                  @Override
                  public ObservableValue<String> call(TreeTableColumn.CellDataFeatures<fiche, String> param) {
                      return param.getValue().getValue().dest;
                  }
              });
              JFXTreeTableColumn<fiche,String> src = new JFXTreeTableColumn<>("source");
              src.setPrefWidth(150);
              src.setCellValueFactory(new Callback<TreeTableColumn.CellDataFeatures<fiche, String>, ObservableValue<String>>() {
                  @Override
                  public ObservableValue<String> call(TreeTableColumn.CellDataFeatures<fiche, String> param) {
                      return param.getValue().getValue().src;
                  }
              });
              JFXTreeTableColumn<fiche,String> date = new JFXTreeTableColumn<>("date");
              date.setPrefWidth(150);
              date.setCellValueFactory(new Callback<TreeTableColumn.CellDataFeatures<fiche, String>, ObservableValue<String>>() {
                  @Override
                  public ObservableValue<String> call(TreeTableColumn.CellDataFeatures<fiche, String> param) {
                      return param.getValue().getValue().date;
                  }
              });
              JFXTreeTableColumn<fiche,String> descr = new JFXTreeTableColumn<>("description");
              descr.setPrefWidth(150);
              descr.setCellValueFactory(new Callback<TreeTableColumn.CellDataFeatures<fiche, String>, ObservableValue<String>>() {
                  @Override
                  public ObservableValue<String> call(TreeTableColumn.CellDataFeatures<fiche, String> param) {
                      return param.getValue().getValue().descr;
                  }
              });
              JFXTreeTableColumn<fiche,String> ref = new JFXTreeTableColumn<>("reference");
              ref.setPrefWidth(150);
              ref.setCellValueFactory(new Callback<TreeTableColumn.CellDataFeatures<fiche, String>, ObservableValue<String>>() {
                  @Override
                  public ObservableValue<String> call(TreeTableColumn.CellDataFeatures<fiche, String> param) {
                      return param.getValue().getValue().ref;
                  }
              });
              JFXTreeTableColumn<fiche,String> from = new JFXTreeTableColumn<>("depuis");
              from.setPrefWidth(150);
              from.setCellValueFactory(new Callback<TreeTableColumn.CellDataFeatures<fiche, String>, ObservableValue<String>>() {
                  @Override
                  public ObservableValue<String> call(TreeTableColumn.CellDataFeatures<fiche, String> param) {
                      return param.getValue().getValue().from;
                  }
              });
              
              
              ObservableList<fiche> fi = FXCollections.observableArrayList();
              
              connexion c = connexion.getDbCon() ;
              ResultSet rs = c.query("SELECT * FROM `ficheorderss` WHERE `destination` like 'bo'");
              List<String> result = new ArrayList<>();
              int i = 1;
              while(rs.next()){
                  while (i <= 8) {
                      result.add(rs.getString(i++));
                  }
                  fi.add(new fiche(result.get(0),result.get(1), result.get(2), result.get(3), result.get(4), result.get(5), result.get(6), result.get(7)));
              }
              
              final  TreeItem<fiche> root = new RecursiveTreeItem<fiche>(fi,RecursiveTreeObject::getChildren);
              
              table.getColumns().setAll(numsort,obj,dest,src,date,descr,ref,from);
              table.setRoot(root);
              table.setShowRoot(false);
              
          } catch (SQLException ex) {
              Logger.getLogger(FXMLbrController.class.getName()).log(Level.SEVERE, null, ex);
          }

          
    }    

    class fiche extends RecursiveTreeObject<fiche>{
         StringProperty nums ;
        StringProperty obj ;
         StringProperty dest ;
         StringProperty src ;
         StringProperty date ;
         StringProperty descr ;
         StringProperty ref ;
         StringProperty from ;

        public fiche(String nums, String obj, String dest, String src, String date, String descr, String ref, String from) {
            this.nums = new SimpleStringProperty(nums);
            this.obj =  new SimpleStringProperty(obj);
            this.dest = new SimpleStringProperty(dest);
            this.src = new SimpleStringProperty(src);
            this.date = new SimpleStringProperty(date);
            this.descr = new SimpleStringProperty(descr);
            this.ref = new SimpleStringProperty(ref);
            this.from = new SimpleStringProperty(from);
        }

        public StringProperty getNums() {
            return nums;
        }

        public StringProperty getObj() {
            return obj;
        }

        public StringProperty getDest() {
            return dest;
        }

        public StringProperty getSrc() {
            return src;
        }

        public StringProperty getDate() {
            return date;
        }

        public StringProperty getDescr() {
            return descr;
        }

        public StringProperty getRef() {
            return ref;
        }

        public StringProperty getFrom() {
            return from;
        }
        
        
    }
    
}
