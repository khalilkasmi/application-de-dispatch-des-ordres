/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package departement;

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
import met.order;
import met.orderT;
import org.controlsfx.control.PopOver;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLbrController implements Initializable {

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
         table.setExpanded(Boolean.TRUE);
        table.depthProperty().set(1);
         try {
             ordera o = new ordera();
             ArrayList<ordera> aro = o.getdata(FXMLdepartementController.getemp().getUsername());
             
             for (ordera object : aro) {
                btn = new JFXButton(object.toString());
                table.getItems().add(btn);
                
                 
                btn.setOnMouseClicked(new EventHandler<MouseEvent>() {
                    @Override
                    public void handle(MouseEvent event) {
                         PopOver pop = new PopOver();
                    pop.setAnimated(true);
                    pop.setTitle("Dispatch vers les services");    
                    s =object.getRef() ;
                    
                    pop.setDetached(true);
                    FXMLLoader loader = new FXMLLoader(getClass().getResource("FXMLdisp.fxml"));
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
    private void open(MouseEvent event) {
        
    }

    @FXML
    private void retour(ActionEvent event) throws IOException {
        pane =  FXMLLoader.load(getClass().getResource("/departement/FXMLdepartement.fxml"));
            rootpane.getChildren().setAll(pane);
        
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
             ArrayList<ordera> ar = new ArrayList<ordera>();
        c = connexion.getDbCon();
        ResultSet rs = c.query("SELECT * FROM `ficheordrea` WHERE `destination` like '%"+d+"%'");
        while(rs.next()){
            ar.add(new ordera(rs.getString(1),rs.getString(2),rs.getString(3),rs.getString(4),rs.getString(5),rs.getString(7),rs.getString(8)));
        }
        return ar;
        }
        

        @Override
        public String toString() {
            return "ordera{" + "num=" + num + ", date=" + date + ", ref=" + ref + ", src=" + src + ", obj=" + obj + ", dest=" + dest + ", descr=" + descr + ", instr=" + instr + '}';
        }
        
        public boolean sendto(String to,ArrayList<ordera> a) throws SQLException{
        c = connexion.getDbCon();
                   //ordera(String num, String date, String ref, String src, String obj, String dest, String descr, String instr)    
            
                   int m = c.insert("INSERT INTO `ficheorderas`"
                    + "(`numorder`, `objet`, `reference`, `source`, `date`, `destination`, `description`, `instruction`)"
                   + " VALUES "
                   + "('"+a.get(0).getNum()+"','"+a.get(0).getObj()+"','"+a.get(0).getRef()+"','"+a.get(0).getSrc()+"','"+a.get(0).getDate()+"','"+to+"','"+a.get(0).getDescr()+"','"+a.get(0).getInstr()+"')");
        if (m==0) {
            return false;
        }else{
            return true;
        }
    }
        
        ArrayList<String>  getservices()  throws SQLException{
            ArrayList<String> st = new ArrayList<>();
             String u =FXMLdepartementController.getemp().getUsername();
            c = connexion.getDbCon();
            ResultSet rs = c.query("SELECT * FROM `service` WHERE `departement` = '"+u+"'"); 
        while(rs.next()){
           
                st.add(rs.getString("designation"));
          
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
    public static void main(String[] args) throws SQLException {
       /* connexion c = connexion.getDbCon();
        ResultSet rs = c.query("SELECT * FROM `service` WHERE `departement` = 'daf'"); 
        while(rs.next()){
            System.out.println(rs.getString("designation"));
        }*/
      
        ordera oa = new ordera();
        ArrayList<String> services = oa.getservices();
        for (String service : services) {
            System.out.println(service);
        }
        
    }
}
