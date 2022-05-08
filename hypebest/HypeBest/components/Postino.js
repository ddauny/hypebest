import React from 'react';

import { Text, View, StyleSheet, Image } from 'react-native';
import logo from '../assets/icon.png';
import { Ionicons } from '@expo/vector-icons';



export default function Postino(props) {
    return (
        <View style={styles.container} >
            <Image style={styles.userPictur} alt={logo} source={logo} />
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
      flex:1,
        marginTop: 0,
        // width: '35%',
        height: 130,
        maxHeight: 130,
        // maxWidth: '35%',
        // paddingHorizontal: 15,
        borderWidth: 2,
        borderColor: 'black',
        // backgroundColor: "white",

    },
    userPictur: {
        width: 130,
        height: 130,
        maxHeight: 130,
        maxWidth: '100%',
        // marginRight: 10,
        // borderWidth: 1,
        // borderColor: 'red',
        // borderTopWidth: 1,
        // borderTopColor: 'black',
        // borderBottomWidth: 1,
        // borderBottomColor: 'black',
    },

});
