/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package infrmq;

import Sect_d.FXMLnfoController;
import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXListView;
import connexion.connexion;
import java.io.IOException;
import java.net.URL;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.ContextMenu;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import org.controlsfx.control.PopOver;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLboiterecController implements Initializable {

    @FXML
    private AnchorPane rootpane;
    @FXML
    private JFXListView<JFXButton> table;
    @FXML
    private JFXButton retourbtn;
    AnchorPane pane;
ContextMenu contextMenu;
   JFXButton btn;
   static  String s = null ;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        table.setExpanded(Boolean.TRUE);
        table.depthProperty().set(1);
        try {
             ordera o = new ordera();
             ArrayList<ordera> aro = o.getdata("S.INFRMTQ");
             aro.stream().map((object) -> {
                 btn = new JFXButton(object.toString());
                return object;
            }).map((object) -> {
                table.getItems().add(btn);
                return object;
            }).forEach((object) -> {
                btn.setOnMouseClicked((MouseEvent event) -> {
                    PopOver pop = new PopOver();
                    pop.setAnimated(true);
                    pop.setTitle("Traitement de la fiche");
                    s =object.getRef() ;
                    pop.setDetached(true);
                    FXMLLoader loader = new FXMLLoader(getClass().getResource("/infrmq/FXMLmenu.fxml"));
                    try {
                        pop.setContentNode((Parent)loader.load());
                        
                        pop.show(btn,800,300);
                        
                    } catch (IOException ex) {
                        Logger.getLogger(FXMLnfoController.class.getName()).log(Level.SEVERE, null, ex);
                    }
                });
            });
         } catch (SQLException ex) {
             Logger.getLogger(FXMLnfoController.class.getName()).log(Level.SEVERE, null, ex);
         }
    }    
        

    @FXML
    private void open(MouseEvent event) {
    }

    @FXML
    private void retour(ActionEvent event) {
        try {
            pane =  FXMLLoader.load(getClass().getResource("/infrmq/FXMLhome.fxml"));
            rootpane.getChildren().setAll(pane);
        } catch (IOException ex) {
            Logger.getLogger(FXMLboiterecController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    
        static  class ordera{
        public String num ;
        public String date ;
        public String ref ;
        public String src ;
        public String obj ;
        public String dest ;
        public String descr ;
        public String instr ;
        static connexion c;
        public ordera(String num, String date, String ref, String src, String obj, String descr, String instr) {
            this.num = num;
            this.date = date;
            this.ref = ref;
            this.src = src;
            this.obj = obj;
            this.descr = descr;
            this.instr = instr;
        }
        
        public ArrayList<ordera> getdata(String d) throws SQLException{
             ArrayList<ordera> ar = new ArrayList<>();
        c = connexion.getDbCon();
        ResultSet rs = c.query("SELECT * FROM `ficheordrea` WHERE `destination` like '%"+d+"%'");
        while(rs.next()){
            //ordera(String num, String date, String ref, String src, String obj, String descr, String instr)
            ar.add(new ordera(rs.getString(1),rs.getString(5),rs.getString(3),rs.getString(4),rs.getString(2),rs.getString(7),rs.getString(8)));
        }
        return ar;
        }
        

        @Override
        public String toString() {
            return "ordera{" + "num=" + num + ", date=" + date + ", ref=" + ref + ", src=" + src + ", obj=" + obj + ", dest=" + dest + ", descr=" + descr + ", instr=" + instr + '}';
        }
        
        public boolean sendto(String to,ArrayList<ordera> a,String from) throws SQLException{
        c = connexion.getDbCon();
                   //ordera(String num, String date, String ref, String src, String obj, String dest, String descr, String instr)    
            System.out.println("INSERT INTO "
                           + "`ficheorderss`"
                           + "(`numordersort`, `objet`, `reference`, `destination`, `source`, `date`, `description`,`from`) "
                           + "VALUES "
                           + "('"+a.get(0).getNum()+"','"+a.get(0).getDate()+"','"+a.get(0).getRef()+"','"+to+"','"+a.get(0).getSrc()+"','"+a.get(0).getObj()+"','"+a.get(0).getDescr()+"','"+from+"')");
                   int m = c.insert("INSERT INTO "
                           + "`ficheorderss`"
                           + "(`numordersort`, `objet`, `reference`, `destination`, `source`, `date`, `description`,`from`) "
                           + "VALUES "
                           + "('"+a.get(0).getNum()+"','"+a.get(0).getDate()+"','"+a.get(0).getRef()+"','"+to+"','"+a.get(0).getSrc()+"','"+a.get(0).getObj()+"','"+a.get(0).getDescr()+"','"+from+"')");
        if (m==0) {
            return false;
        }else{
            return true;
        }
    }
        
        ArrayList<String>  getdep()  throws SQLException{
            ArrayList<String> st = new ArrayList<>();
             String u =FXMLhomeController.getemp().getUsername();
            c = connexion.getDbCon();
            ResultSet rs = c.query("SELECT * FROM `service` WHERE `designation`  = '"+u+"'"); 
        while(rs.next()){
           
                st.add(rs.getString("departement"));
          
        }
        return st;
        }
        
        public ordera() {
        }

        public String getNum() {
            return num;
        }

        public String getDate() {
            return date;
        }

        public String getRef() {
            return ref;
        }

        public String getSrc() {
            return src;
        }

        public String getObj() {
            return obj;
        }

        public String getDest() {
            return dest;
        }

        public String getDescr() {
            return descr;
        }

        public String getInstr() {
            return instr;
        }
        
    }
    
    
}
