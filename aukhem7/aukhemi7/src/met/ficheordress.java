/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package met;

import com.jfoenix.controls.datamodels.treetable.RecursiveTreeObject;
import connexion.connexion;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;
import javafx.collections.ObservableList;

/**
 *µ
 * @author kasmi
 */
public class ficheordress extends RecursiveTreeObject<ficheordress> {
    public String nums ;
    public String obj ;
    public String dest ;
    public String src ;
    public String date ;
    public String descr ;
    public String ref ;
    public String from ;

    public ficheordress(String nums, String obj, String dest, String src, String date, String descr, String ref, String from) {
        this.nums = nums;
        this.obj = obj;
        this.dest = dest;
        this.src = src;
        this.date = date;
        this.descr = descr;
        this.ref = ref;
        this.from = from;
    }

    public ficheordress(List<String> r) {
        this.nums = r.get(0);
        this.obj = r.get(1);
        this.dest = r.get(2);
        this.src = r.get(3);
        this.date = r.get(4);
        this.descr = r.get(5);
        this.ref = r.get(6);
        this.from = r.get(7);
    }

    
    
}
