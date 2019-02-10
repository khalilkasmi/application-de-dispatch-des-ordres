/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package departement;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXDialog;
import com.jfoenix.controls.JFXListView;
import com.jfoenix.controls.JFXSnackbar;
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
import javafx.event.Event;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.control.ContextMenu;
import javafx.scene.control.Label;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.StackPane;
import met.employe;

/**
 * FXML Controller class
 *
 * @author kasmi
 */
public class FXMLotController implements Initializable {

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
   JFXSnackbar sn;
    @FXML
    private StackPane st;
   ArrayList<ordera> aro;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        table.setExpanded(Boolean.TRUE);
            table.depthProperty().set(1);
            
            
            ordera o = new ordera();
             aro = new ArrayList<>();
        try {
            aro = o.getdata(FXMLdepartementController.getemp().getUsername());
        } catch (SQLException ex) {
            sn = new JFXSnackbar(rootpane);
                            EventHandler handler =new EventHandler() {
                                @Override
                                public void handle(Event event) {
                                    JFXDialog db = new JFXDialog(st, new Label(ex.getMessage()), JFXDialog.DialogTransition.TOP);
                                    db.show();
                                }
                            };
                            sn.show("erreur ","afficher", 3000,handler);
        }
            for (ordera object : aro) {
                btn = new JFXButton(object.toString());
                table.getItems().add(btn);
                btn.setOnMouseClicked(new EventHandler<MouseEvent>() {
                    @Override
                    public void handle(MouseEvent event) {
                        if (event.getClickCount() == 2) {
                            try {
                                o.sendto("SECT.D",aro,FXMLdepartementController.getemp().getUsername());
                            } catch (SQLException ex) {
                               sn = new JFXSnackbar(rootpane);
                            EventHandler handler =new EventHandler() {
                                @Override
                                public void handle(Event event) {
                                    JFXDialog db = new JFXDialog(st, new Label(ex.getMessage()), JFXDialog.DialogTransition.TOP);
                                    db.show();
                                }
                            };
                            sn.show("erreur ","afficher", 3000,handler);
                            }
                            sn = new JFXSnackbar(rootpane);
                            EventHandler handler =new EventHandler() {
                                @Override
                                public void handle(Event event) {
                                    sn.unregisterSnackbarContainer(rootpane);
                                }
                            };
                            sn.show("envoyé vers Direction ","D'accord", 3000,handler);
                        }
                    }});
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
        
        public String from;
        static connexion c;

        public ordera(String num, String date, String ref, String src, String obj, String descr,  String from) {
            this.num = num;
            this.date = date;
            this.ref = ref;
            this.src = src;
            this.obj = obj;
            this.descr = descr;
           
            this.from = from;
        }
        
        
        public ArrayList<ordera> getdata(String d) throws SQLException{
             ArrayList<ordera> ar = new ArrayList<ordera>();
        c = connexion.getDbCon();
        ResultSet rs = c.query("SELECT * FROM `ficheorderss` WHERE `destination` like '%"+d+"%'");
        while(rs.next()){
            //String num, String date, String ref, String src, String obj, String descr,  String from)
           
            ar.add(new ordera(rs.getString(1),rs.getString(5),rs.getString(7),rs.getString(4),rs.getString(2),rs.getString(6),rs.getString(8)));
        }
        return ar;
        }

        @Override
        public String toString() {
            return "ordera{" + "num=" + num + ", date=" + date + ", ref=" + ref + ", src=" + src + ", obj=" + obj + ", dest=" + dest + ", descr=" + descr + ", from=" + from + '}';
        }
        

        
        
        public boolean sendto(String to,ArrayList<ordera> a,String from) throws SQLException{
        c = connexion.getDbCon();
                   //ordera(String num, String date, String ref, String src, String obj, String dest, String descr, String instr)    
            System.out.println("INSERT INTO `ficheorderss`(`numordersort`, `objet`, `destination`, `source`, `date`, `description`, `reference`, `from`)"
                           + " VALUES "
                           + "('"+a.get(0).getNum()+"','"+a.get(0).getObj()+"','SECT.D','"+a.get(0).getSrc()+"','"+a.get(0).getDate()+"','"+a.get(0).getDescr()+"','"+a.get(0).getRef()+"','"+a.get(0).getFrom()+"')");
                   int m = c.insert("INSERT INTO `ficheorderss`(`numordersort`, `objet`, `destination`, `source`, `date`, `description`, `reference`, `from`)"
                           + " VALUES "
                           + "('"+a.get(0).getNum()+"','"+a.get(0).getObj()+"','SECT.D','"+a.get(0).getSrc()+"','"+a.get(0).getDate()+"','"+a.get(0).getDescr()+"','"+a.get(0).getRef()+"','"+from+"')");
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

        public String getFrom() {
            return from;
        }

       
        
    }
    public static void main(String[] args) throws SQLException {
       /* connexion c = connexion.getDbCon();
        ResultSet rs = c.query("SELECT * FROM `service` WHERE `departement` = 'daf'"); 
        while(rs.next()){
            System.out.println(rs.getString("designation"));
        }*/
      
        ordera oa = new ordera();
        ArrayList<ordera> services = oa.getdata("daf");
        for (ordera service : services) {
            System.out.println(service);
        }
        
    }

    @FXML
    private void retour(ActionEvent event) throws IOException {
        pane =  FXMLLoader.load(getClass().getResource("/departement/FXMLdepartement.fxml"));
            rootpane.getChildren().setAll(pane);
    }

}

