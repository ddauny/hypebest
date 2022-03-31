import React from 'react';

import { Text, View, StyleSheet, Image } from 'react-native';
import logo from '../assets/icon.png';
import { Ionicons } from '@expo/vector-icons';

export default function Post(props) {
    return (
        <View style={styles.container}>
            <View style={styles.title}>
                <Image style={styles.titleUserPic} source={logo} />
                <Text style={styles.titleUsername}> Ciao amici miei</Text>
                <Ionicons
                    name={'heart-outline'}
                    size={30}
                    color={'black'}
                    onPress={() => navigation.navigate('Profilo')}
                    style={styles.like}
                />
            </View>
            <Image style={styles.userPictur} source={logo} />
            <View style={styles.commenti}>
            <Text > Ciao amici miei</Text>
            </View>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        marginTop:30,
        width: '100%',
        height: 614,
        maxHeight: 614,
        maxWidth: 614,
        // paddingHorizontal: 15,
        borderWidth: 2,
        borderColor: 'black',
        backgroundColor:"white",
    },
    title: {
        // flexDirection: 'row',
        width: '100%',
        height: 50,
        //         borderWidth: 1,
        // borderColor: 'red',
        borderBottomWidth: 1,
        borderBottomColor: 'black',
    },

    titleUserPic: {
        position: "absolute",
        left: -5,
        top: -8,
        width: 65,
        height: 65,
    },
    titleUsername: {
        fontWeight: "bold",
        position: "absolute",
        left: 50,
        top: 14,
    },
    userPictur: {
        width: '100%',
        height: 470,
        marginRight: 10,
        // borderWidth: 1,
        // borderColor: 'red',
        // borderTopWidth: 1,
        // borderTopColor: 'black',
        // borderBottomWidth: 1,
        // borderBottomColor: 'black',
    },
    like: {
        position: "absolute",
        right: 10,
        top: 8,
    },
    commenti: {
        flexDirection: 'row',
        width: '100%',
        height: 90,
        borderTopWidth: 1,
        borderTopColor: 'black',
        // borderBottomWidth: 1,
        // borderBottomColor: 'black',
        // borderWidth: 1,
        // borderColor: 'red',
    },
});
