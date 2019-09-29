package com.hng.task;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.material.snackbar.Snackbar;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.hng.task.models.User;

public class Sign_up extends AppCompatActivity {

    //widgets
    private TextView txtSignIn;
    private EditText mFullName;
    private EditText mEmail;
    private EditText mPassword;
    private EditText mConfirmPassword;
    private EditText mPhone;

    //firebase variables
    private FirebaseAuth mAuth;
    private FirebaseDatabase mFirebaseDatabase;
    private DatabaseReference users;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        //init firebase
        mAuth = FirebaseAuth.getInstance();
        mFirebaseDatabase = FirebaseDatabase.getInstance();
        users = mFirebaseDatabase.getReference("users");

        //init widgets
        txtSignIn = findViewById(R.id.txt_signin);
        mFullName = findViewById(R.id.name);
        mEmail = findViewById(R.id.email);
        mPassword = findViewById(R.id.password);
        mConfirmPassword = findViewById(R.id.cpassword);
        mPhone = findViewById(R.id.phone);

        txtSignIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(Sign_up.this, Sign_in.class));
                finish();
            }
        });
    }

    public void signUp(View view) {
        if(TextUtils.isEmpty(mFullName.getText().toString()) && mFullName.getText().toString().length() < 3){
            Toast.makeText(Sign_up.this, "Please Enter a valid Name", Toast.LENGTH_LONG).show();
            return;
        } else if(TextUtils.isEmpty(mEmail.getText().toString()) && !mEmail.getText().toString().contains("@")){
            Toast.makeText(Sign_up.this, "Please Enter a valid Email Address", Toast.LENGTH_LONG).show();
            return;
        } else if(TextUtils.isEmpty(mPassword.getText().toString())){
            Toast.makeText(Sign_up.this, "Please Enter a valid Password", Toast.LENGTH_LONG).show();
            return;
        } else if(TextUtils.isEmpty(mConfirmPassword.getText().toString()) && !mEmail.getText().toString().contains("@")){
            Toast.makeText(Sign_up.this, "Please Enter a valid Password", Toast.LENGTH_LONG).show();
            return;
        } else if(!mPassword.getText().toString().equalsIgnoreCase(mConfirmPassword.getText().toString())){
            Toast.makeText(Sign_up.this, "Passwords do not match", Toast.LENGTH_LONG).show();
            mPassword.setText("");
            mConfirmPassword.setText("");
            return;
        } else if(TextUtils.isEmpty(mPhone.getText().toString()) && mPhone.getText().toString().length() < 9){
            Toast.makeText(Sign_up.this, "Please Enter a valid Phone Number", Toast.LENGTH_LONG).show();
            return;
        } else {
            //Register User
            mAuth.createUserWithEmailAndPassword(mEmail.getText().toString(), mPassword.getText().toString())
                    .addOnSuccessListener(new OnSuccessListener<AuthResult>() {
                        @Override
                        public void onSuccess(AuthResult authResult) {
                            //save user to the database
                            User user = new User();
                            user.setFullName(mFullName.getText().toString());
                            user.setEmail(mEmail.getText().toString());
                            user.setPhone(mPhone.getText().toString());

                            //use phone as key
                            users.child(mAuth.getCurrentUser().getUid())
                                    .setValue(user)
                                    .addOnSuccessListener(new OnSuccessListener<Void>() {
                                        @Override
                                        public void onSuccess(Void aVoid) {
                                            Toast.makeText(Sign_up.this, "Registration Successful", Toast.LENGTH_LONG).show();
                                        }
                                    })
                                    .addOnFailureListener(new OnFailureListener() {
                                        @Override
                                        public void onFailure(@NonNull Exception e) {
                                            Toast.makeText(Sign_up.this, "Registration Failed", Toast.LENGTH_LONG).show();
                                        }
                                    });

                            startActivity(new Intent(Sign_up.this,Chat_screen.class));
                            finish();
                        }
                    })
            .addOnFailureListener(new OnFailureListener() {
                @Override
                public void onFailure(@NonNull Exception e) {
                    Toast.makeText(Sign_up.this, "Authentication Failed: "  + e.getMessage(), Toast.LENGTH_LONG).show();
                }
            });
        }

    }
}
