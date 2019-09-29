package com.hng.task;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.hng.task.models.User;

import de.hdodenhof.circleimageview.CircleImageView;

public class Profile extends AppCompatActivity {

    private static final String TAG = "Profile";

    //widgets
    private EditText profileName;
    private EditText profileEmail;
    private EditText profileContact;
    private CircleImageView profileImage;
    private TextView logout;

    //firebase variables
    private FirebaseAuth mAuth;
    private FirebaseDatabase mFirebaseDatabase;
    private DatabaseReference user;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        //init firebase
        mAuth = FirebaseAuth.getInstance();
        mFirebaseDatabase = FirebaseDatabase.getInstance();
        String g = mAuth.getCurrentUser().getUid();
        user = mFirebaseDatabase.getReference("users").child(g);

        //init widgets
        profileName = findViewById(R.id.profileName);
        profileEmail = findViewById(R.id.profileEmail);
        profileContact = findViewById(R.id.profileContact);
        profileImage = findViewById(R.id.profilePicture);
        logout = findViewById(R.id.logout);


        profileName.setEnabled(false);
        profileEmail.setEnabled(false);
        profileContact.setEnabled(false);


        user.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                if(dataSnapshot.getValue() != null){
                    User u = dataSnapshot.getValue(User.class);
                    profileName.setText(u.getFullName());
                    profileEmail.setText(u.getEmail());
                    profileContact.setText(u.getPhone());
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(mAuth.getCurrentUser() != null){
                    mAuth.signOut();
                    Intent mine = new Intent(Profile.this, Sign_in.class);
                    Toast.makeText(Profile.this, "Signed out", Toast.LENGTH_LONG).show();
                    startActivity(mine);
                    finish();
                }
            }
        });
    }
}
