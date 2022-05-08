import React from 'react';
import { Text, View, StyleSheet } from 'react-native';
import ProfileHeader from '../components/ProfileHeader';
// import { auth } from "../firebase"
import Postino from '../components/Postino';

export default function Profilo(props) {
  return (
    <View style={styles.container}>
      <ProfileHeader style={styles.header} user={props} />
        <View style={styles.immagini}>
          <Postino
            username={'Marco'}
            descrizione="sjahdaskdkjsahdjasdkjahsd"
          />
                  <Postino
            username={'Marco'}
            descrizione="sjahdaskdkjsahdjasdkjahsd"
          />
                          <Postino
            username={'Marco'}
            descrizione="sjahdaskdkjsahdjasdkjahsd"
          />
        </View>
              <View style={styles.immagini}>
          <Postino
            username={'Marco'}
            descrizione="sjahdaskdkjsahdjasdkjahsd"
          />
                  <Postino
            username={'Marco'}
            descrizione="sjahdaskdkjsahdjasdkjahsd"
          />
                          <Postino
            username={'Marco'}
            descrizione="sjahdaskdkjsahdjasdkjahsd"
          />
        </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    top: 0,
  },
  header: {
    position: 'absolute',
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
  },
  immagini: {    
    flex: 1,
    flexDirection:"row",
        // alignItems: 'center',
    // justifyContent: 'center',
    // top: 0,
    
    },
    containerImmagini:{    
      // flex: 1,
      }

});
