/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package met;

import connexion.connexion;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

/**
 *
 * @author kasmi
 */
public class orderT {
    private  connexion c;
    public static  String nums;
    public static String obj;
    public static String source;
    public static String date;
    public static String desc;
    public static String ref;
    public static String from;

    public orderT(String nums, String obj, String source, String date, String desc, String ref, String from) {
        this.nums = nums;
        this.obj = obj;
        this.source = source;
        this.date = date;
        this.desc = desc;
        this.ref = ref;
        this.from = from;
    }

    public orderT() {
    }

    public String getNums() {
        return nums;
    }

    public String getObj() {
        return obj;
    }

    public String getSource() {
        return source;
    }

    public String getDate() {
        return date;
    }

    public String getDesc() {
        return desc;
    }

    public String getRef() {
        return ref;
    }

    public String getFrom() {
        return from;
    }

    @Override
    public String toString() {
        return "nums= "+ nums + ", obj=" + obj + ", source=" + source + ", date=" + date + ", desc=" + desc + ", ref=" + ref + ", from=" + from ;
    }
    
    public ArrayList<orderT> getorders(String d) throws SQLException{
        ArrayList<orderT> ar = new ArrayList<orderT>();
        c = connexion.getDbCon();
        ResultSet rs = c.query("SELECT * FROM `ficheorderss` WHERE `destination` = '"+d+"'");
        while(rs.next()){
            //             orderT(String nums, String obj, String source, String date, String desc, String ref, String from) 
            ar.add(new orderT(rs.getString(1),rs.getString(2),rs.getString(4),rs.getString(5),rs.getString(6),rs.getString(7),rs.getString(8)));
        }
        return ar;
    }
    public boolean sendto(String to,ArrayList<orderT> a,String from) throws SQLException{
        c = connexion.getDbCon();
        System.out.println("INSERT INTO `ficheorderss`(`numordersort`, `objet`, `destination`, `source`, `date`, `description`, `reference`, `from`)"
                    + " VALUES"
                    + " ('"+a.get(0).getNums()+"','"+a.get(0).getObj()+"','"+to+"','"+a.get(0).getSource()+"','"+a.get(0).getDate()+"','"+a.get(0).getDesc()+"','"+a.get(0).getRef()+"','"+from+"'");
            int m = c.insert("INSERT INTO `ficheorderss`(`numordersort`, `objet`, `destination`, `source`, `date`, `description`, `reference`, `from`)"
                    + " VALUES"
                    + " ('"+a.get(0).getNums()+"','"+a.get(0).getObj()+"','"+to+"','"+a.get(0).getSource()+"','"+a.get(0).getDate()+"','"+a.get(0).getDesc()+"','"+a.get(0).getRef()+"','"+from+"')");
        if (m==0) {
            return false;
        }else{
            return true;
        }
    }


}
