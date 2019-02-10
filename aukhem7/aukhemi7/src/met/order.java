/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package met;

import connexion.connexion;
import java.sql.Array;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author kasmi
 */
public class order {
    private String objet;
    private String reference;
    private String source;
    private  connexion c;
    public order(String objet, String reference, String source) {
        this.objet = objet;
        this.reference = reference;
        this.source = source;
    }

    public order() {
    }

    public String getObjet() {
        return objet;
    }

    public void setObjet(String objet) {
        this.objet = objet;
    }

    public String getReference() {
        return reference;
    }

    public void setReference(String reference) {
        this.reference = reference;
    }

    public String getSource() {
        return source;
    }

    public void setSource(String source) {
        this.source = source;
    }
    
    public boolean enregistrerordre() throws SQLException{
        c = connexion.getDbCon() ;
        int m = c.insert("INSERT INTO `order`(`objet`, `reference`, `source`) VALUES ('"+objet+"','"+reference+"','"+source+"')");
        if (m == 1) {
            return true;
        }return false;
    }
    
    public boolean supprimerordre(String ref) throws SQLException{
         c = connexion.getDbCon() ;
        int m = c.insert("DELETE FROM `order` WHERE `reference` like '"+ ref +"%'");
        if (m == 1) {
            return true;
        }return false;
    }
    
    public ArrayList<order> getorders() throws SQLException{
        ArrayList<order> ar = new ArrayList<order>();
        c = connexion.getDbCon();
        ResultSet rs = c.query("SELECT * FROM `order`");
        while(rs.next()){
             ar.add(new order(rs.getString(1),rs.getString(2),rs.getString(3)));
        }
        return ar;
    }

    @Override
    public String toString() {
        return  " |OBJET| =" + objet + " |REFERENCE| =" + reference + " |SOURCE| =" + source ;
    }
   
    
    
      

}
