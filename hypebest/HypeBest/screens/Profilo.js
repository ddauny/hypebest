import React from "react";
import { Text,View,StyleSheet } from "react-native";
import ProfileHeader from "../components/ProfileHeader";
export default function Profilo(){
  return (
    <View style={styles.container}>
      <ProfileHeader/>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
  },
});
