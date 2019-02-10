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
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import responsable_BO.FXMLbrController;

/**
 *
 * @author kasmi
 */
public class employe {
    private  String username;
    private  String password;
    private  String role;
    private  String fullname;

    public   employe(String username, String password, String role, String fullname) {
        this.username = username;
        this.password = password;
        this.role = role;
        this.fullname = fullname;
    }

    public employe() {
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getRole() {
        return role;
    }

    public void setRole(String role) {
        this.role = role;
    }

    public String getFullname() {
        return fullname;
    }

    public void setFullname(String fullname) {
        this.fullname = fullname;
    }

    
    
}
